<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
    <div>
        @if ($tachesFiltrees->count() > 0)
    <table>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date échéance</th>
            <th>Status</th>
            <!-- Ajoutez d'autres colonnes si nécessaire -->
        </tr>
        @foreach ($tachesFiltrees as $tache)
        <tr>
            <td>{{ $tache->id }}</td>
            <td>{{ $tache->titre }}</td>
            <td>{{ $tache->description }}</td>
            <td>{{ $tache->dateE }}</td>
            <td>{{ $tache->statut }}</td>
            <!-- Ajoutez d'autres colonnes si nécessaire -->
        </tr>
        @endforeach
    </table>
    {{ $tachesFiltrees->links() }} <!-- Ajoutez la pagination si nécessaire -->
    @else
    <p>Aucune tâche trouvée pour ce statut.</p>
    @endif
</body>
</html>