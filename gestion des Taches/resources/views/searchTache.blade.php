<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
</div>
@if($taches->count() !==0)
<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date echéances</th>
        <th>Status</th>
    </tr>
    @foreach($taches as $tache)
    <tr>
        <td>{{$tache->id}}</td>
        <td>{{$tache->titre}}</td>
        <td>{{$tache->description}}</td>
        <td>{{$tache->dateE}}</td>
        <td>{{$tache->statut}}</td>
    @endforeach
</table>
<div>
@else
<p>taches count 0</p>
@endif
</body>
</html>