<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Liste des taches</h1>
    <a href="/ajouter">Ajouter une Tache</a>
    </div>
    @if($taches->count() !==0)
    <table>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date echéances</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($taches as $tache)
        <tr>
            <td>{{$tache->id}}</td>
            <td>{{$tache->titre}}</td>
            <td>{{$tache->description}}</td>
            <td>{{$tache->dateE}}</td>
            <td>{{$tache->statut}}</td>
            <td>
                <a href="/edit/{{$tache->id}}">Modifier</a>
            </td>
            <td>
                <form action="/supprimer/{{$tache->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
            <td>
                <form action="/terminer/{{$tache->id}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit">Marquer comme terminée</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <form action="/taches" method="GET">
            <button type="submit" name="tri" value="date">Trier par date</button>
            <button type="submit" name="tri" value="titre">Trier par titre</button>
        </form>
    </div>
    <div class="pagination ">{{$taches->links()}}</div>
    @else
    <p>La table taches vide ou not exist</p>
    @endif

    <h2>Filtrer et Chercher</h2>

    <div>
        <form action="/filter/{{$tache->statut}}" method="post">
            @csrf
            <label>Filtrer par status</label>
            <input type="text" name="statut"/>
            <button type="submit">filtrer</button>
        </form>
    </div>
    <div>
        <form action="/rechercher" method="GET">
            <div>
                <label for="search">Rechercher par titre ou description :</label>
                <input type="text" id="search" name="search" placeholder="Entrez un titre ou une description">
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div>
</body>
</html>