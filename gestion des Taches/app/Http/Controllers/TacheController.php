<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;
use App\Events\TacheModifiee;

class TacheController extends Controller
{
    public function afficherTaches(Request $request) {
        $tri = $request->query('tri'); // Récupérer le paramètre de tri depuis la requête
    
        // Déterminer le type de tri
        switch ($tri) {
            case 'date':
                $taches = Tache::orderBy('dateE', 'asc')->paginate(10);
                break;
            case 'titre':
                $taches = Tache::orderBy('titre', 'asc')->paginate(10);
                break;
            default:
                $taches = Tache::paginate(10); // Tri par défaut si aucun paramètre n'est spécifié
                break;
        }
    
        return view('readTaches', ['taches' => $taches]);
    }

    public function editTache($id){
        $tache = Tache::find($id);
        return view('updateTache',['tache' => $tache]);
    }

    public function updateTache(Request $request,$id){
        $tache = Tache::find($id);
        $tache->id = $request->id;
        $tache->titre = $request->titre;
        $tache->description = $request->description;
        $tache->dateE = $request->dateE;
        $tache->statut = $request->statut;
        $tache->save();

        $champsModifies = [
            'id' => $tache->id,
            'titre' => $tache->titre,
            'description' => $tache->description,
            'dateE' => $tache->dateE,
            'statut' => $tache->statut,
        ];

        event(new TacheModifiee($tache, $champsModifies));
        return redirect('taches');
    }

    public function supprimerTache($id){
        $tache = Tache::find($id);
        $tache->delete();
        return redirect('taches');
    }

    public function ajouterTache(Request $request){
        $tache = new Tache;
        $tache->id = $request->id;
        $tache->titre = $request->titre;
        $tache->description = $request->description;
        $tache->dateE = $request->dateE;
        $tache->save();
        return redirect('taches');
        
    }

    public function filtrerTache($statut){
        $tachesFiltrees = Tache::where('statut', $statut)->paginate(10);
        return view('filterTache', ['tachesFiltrees' => $tachesFiltrees]);
    }

    public function rechercherTaches(Request $request){
        $request->validate([
            'search'=>'required|string'
        ]);
        $taches = Tache::where('titre',$request->search)->orWhere('description',$request->search)->paginate(10);
        return view('searchTache',['taches' => $taches]);
    }

    public function marquerTerminee($id){
        $tache = Tache::findOrFail($id);
        $tache->statut = 'terminee';
        $tache->save();

        return redirect('taches');
    }

}

