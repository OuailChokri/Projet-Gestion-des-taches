<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
    <form  action="/update/{{$tache->id}}" method="post">
        @csrf
        <label>Id</label><input type="text" value="{{$tache->id}}" name="id"/>
        <label>Titre</label><input type="text" value="{{$tache->titre}}" name="titre"/>
        <label>Description</label><input type="text" value="{{$tache->description}}" name="description"/>
        <label>date Echéances</label><input type="text" value="{{$tache->dateE}}" name="dateE"/>
        <label>status</label><input type="text" value="{{$tache->statut}}" name="statut"/>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>