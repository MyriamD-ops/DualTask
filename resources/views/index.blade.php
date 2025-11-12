<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Ma liste de tâches</h1>


   
    <div>
        <br>
        @forelse ($tasks as $task )
        {{$task->tache}}    <br>
        <a href="{{ route('welcome', $task->id) }}" class="text-white/70 hover:text-white">
        <i class="fas fa-edit"></i>
        </a>    
   


        @empty
        Vous n'avez pas de tâches
        @endforelse











    </div>
</body>
</html>