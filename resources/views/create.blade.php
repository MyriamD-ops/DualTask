<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Ajouter une nouvelle tâche</h1>
    
    <form action="{{route('contacts.store')}} " method="POST">
        <!-- TODO: Ajouter un token CSRF -->
        @csrf

        <label for="tache">Tâche</label>
        <input type="text" id="tache" name="tache" placeholder="Entrez la tâche">
        
        <!-- TODO: Ajouter user id -->
        <label for="user_id">Utilisateur</label>
        <input type="text" id="user_id" name="user_id" placeholder="Entrez l pour admin, 2 pour user">

            
    <a href="{{route('welcome')}}">Retour à la liste</a>
    
</body>
</html>