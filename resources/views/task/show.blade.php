<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Moderne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #022D28 0%, #2F779E 100%);
            min-height: 100vh;
        }
        .task-item {
            transition: all 0.3s ease;
        }
        .task-item:hover {
            transform: translateY(-2px);
        }
        .dashboard-link {
            transition: all 0.3s ease;
        }
        .dashboard-link:hover {
            transform: translateX(5px);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .color-option {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        .color-option:hover {
            transform: scale(1.1);
        }
        .color-option.active {
            border-color: white;
            transform: scale(1.1);
        }
        .task-color-indicator {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            margin-right: 12px;
        }
        .btn-primary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="min-h-screen py-8 px-4">
    <div class="max-w-md mx-auto">
        <!-- En-tête avec navigation -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white">Bonjour, Utilisateur</h1>
                <a href="{{route('welcome')}}" class="welcome-link text-white/80 flex items-center text-sm mt-1">
                    <i class="fas fa-arrow-left mr-2"></i>Annuler
                </a>
            </div>
            <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-white font-bold border border-white/20">
                U
            </div>
        </div>


       

        <!-- Mise à jour de tâche -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-white">Mettre à jour</h2>
                <div class="flex space-x-2">
                    <button class="text-white/70 hover:text-white transition-colors" id="sortByColor">
                        <i class="fas fa-palette"></i>
                    </button>
                    <button class="text-white/70 hover:text-white transition-colors">
                        <i class="fas fa-sort"></i>
                    </button>
                </div>
            </div>

            <div id="taskList" class="space-y-3">
            
                <!-- Exemple de tâche avec données dynamiques -->
                
                <div class="task-item bg-white/10 rounded-xl p-4 flex items-center justify-between" style="border-left: 4px solid #96CEB4;">
                    <div class="flex items-center">
                        <div class="task-color-indicator" style="background-color: #96CEB4;"></div>
                        <div>
                            <span class="font-medium text-white block">{{ $task->tache }}</span>
                            <span class="text-white/60 text-sm">ID: {{ $task->user_id }} | Statut: {{ $task->state }}</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <!-- Bouton Modifier -->
                         <form action ="{{ route('task.update', $task->id) }}" method="PATCH" class="inline">
                                @csrf
                                @method('UPDATE')
                                                             
                            <button type="submit" class="text-white/70 hover:text-white transition-colors edit-task"
                                    onclick="return confirm('Êtes-vous sûr de vouloir modifier cette tâche ?')"
                                    class="text-white/70 hover:text-white transition-colors edit-task">
                                <i class="fas fa-edit"></i>            
                                </button> 
                            </form>   
                </div>           
                </div>


                <div>
                    <form action="{{ route('task.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    @section('content')
                    <h1><input type="text" name="title" value="{{ $task->title }}"></h1>
                    <p>{{ $task->state }}</p>
                    @endsection
                    <button type="submit">Valider</button>
                    </form>    
                    </div>

                </div>
                      
    

    <script>
        // Mise à jour de la date du jour
        document.getElementById('dateToday').textContent = new Date().toLocaleDateString('fr-FR', {
            day: 'numeric',
            month: 'short'
        });

        // Animation d'apparition des éléments
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.task-item, .glass-effect');
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    element.style.transition = 'all 0.5s ease';
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

    </script>
</body>
</html>