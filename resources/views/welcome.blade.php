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
                <a href="{{route('dashboard')}}" class="dashboard-link text-white/80 flex items-center text-sm mt-1">
                    <i class="fas fa-arrow-left mr-2"></i> Retourner au Dashboard
                </a>
            </div>
            <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-white font-bold border border-white/20">
                U
            </div>
        </div>

        <!-- Cartes d'information -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="glass-effect text-white rounded-2xl p-4 shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm opacity-80">Tâches</p>
                        <p class="text-2xl font-bold mt-1">5</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                        <i class="fas fa-tasks"></i>
                    </div>
                </div>
            </div>
            <div class="glass-effect text-white rounded-2xl p-4 shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm opacity-80">Aujourd'hui</p>
                        <p class="text-lg font-bold mt-1" id="dateToday"></p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                        <i class="fas fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaire d'ajout avec sélecteur de couleur -->
        <div class="glass-effect rounded-2xl p-6 mb-6 shadow-lg">
            <h2 class="text-xl font-semibold text-white mb-4">Ajouter une nouvelle tâche</h2>
            
            <form id="taskForm">
                <div class="mb-4">
                    <label for="taskName" class="block text-white/80 text-sm mb-2">Nom de la tâche</label>
                    <input type="text" id="taskName" placeholder="Entrez le nom de la tâche..." 
                           class="w-full bg-white/10 text-white rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-white/30 placeholder-white/60">
                </div>
                
                <div class="mb-4">
                    <label for="taskId" class="block text-white/80 text-sm mb-2">Identifiant</label>
                    <input type="text" id="taskId" placeholder="Entrez l'identifiant" 
                           class="w-full bg-white/10 text-white rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-white/30 placeholder-white/60">
                </div>
                
                <div class="mb-6">
                    <label class="block text-white/80 text-sm mb-3">Catégorie</label>
                    <div class="flex space-x-3">
                        <div class="color-option active" data-color="#FF6B6B" style="background-color: #FF6B6B;"></div>
                        <div class="color-option" data-color="#4ECDC4" style="background-color: #4ECDC4;"></div>
                        <div class="color-option" data-color="#45B7D1" style="background-color: #45B7D1;"></div>
                        <div class="color-option" data-color="#96CEB4" style="background-color: #96CEB4;"></div>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <a href="{{route('dashboard')}}" class="text-white/80 hover:text-white transition-colors flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Retour
                    </a>
                    <button type="submit" class="btn-primary text-white font-medium py-3 px-6 rounded-xl flex items-center">
                        <i class="fas fa-check mr-2"></i> Valider
                    </button>
                </div>
            </form>
        </div>

        <!-- Liste des tâches -->
        <div class="glass-effect rounded-2xl p-6 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-white">Mes Tâches</h2>
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
                <!-- Tâches avec différentes couleurs -->
                
                    
                    <div class="flex space-x-2">
                        <button class="text-white/70 hover:text-white transition-colors edit-task">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-white/70 hover:text-white transition-colors delete-task">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                

                

                <!-- Exemple de tâche avec données dynamiques -->
                @forelse ($tasks as $task)
                <div class="task-item bg-white/10 rounded-xl p-4 flex items-center justify-between" style="border-left: 4px solid #96CEB4;">
                    <div class="flex items-center">
                        <div class="task-color-indicator" style="background-color: #96CEB4;"></div>
                        <div>
                            <span class="font-medium text-white block">{{$task->tache}}</span>
                            <span class="text-white/60 text-sm">ID: {{$task->user_id}} | Statut: {{$task->state}}</span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-white/70 hover:text-white transition-colors edit-task">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-white/70 hover:text-white transition-colors delete-task">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                @empty
                <div id="emptyState" class="text-center py-8">
                    <i class="fas fa-check-circle text-4xl text-white/50 mb-3"></i>
                    <p class="text-white/70">Aucune tâche pour le moment. Ajoute ta première tâche !</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Légende des couleurs -->
        <div class="glass-effect rounded-2xl p-4 mt-6">
            <p class="text-white/70 text-sm mb-2 text-center">Légende des couleurs :</p>
            <div class="grid grid-cols-4 gap-2 text-xs text-white/70">
                <div class="flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-[#FF6B6B] mr-1"></div>
                    <span>Urgent</span>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-[#4ECDC4] mr-1"></div>
                    <span>Travail</span>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-[#45B7D1] mr-1"></div>
                    <span>Personnel</span>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-[#96CEB4] mr-1"></div>
                    <span>Loisirs</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mise à jour de la date du jour
        document.getElementById('dateToday').textContent = new Date().toLocaleDateString('fr-FR', {
            day: 'numeric',
            month: 'short'
        });

        // Gestion du sélecteur de couleurs
        const colorOptions = document.querySelectorAll('.color-option');
        let selectedColor = '#FF6B6B';

        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                selectedColor = this.getAttribute('data-color');
            });
        });

        // Gestion de la soumission du formulaire
        document.getElementById('taskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const taskName = document.getElementById('taskName').value;
            const taskId = document.getElementById('taskId').value;
            
            if (taskName && taskId) {
                // Ici, vous pouvez ajouter la logique pour sauvegarder la tâche
                alert(`Tâche "${taskName}" avec ID "${taskId}" ajoutée avec succès!`);
                
                // Réinitialiser le formulaire
                document.getElementById('taskForm').reset();
                colorOptions.forEach(opt => opt.classList.remove('active'));
                document.querySelector('.color-option[data-color="#FF6B6B"]').classList.add('active');
                selectedColor = '#FF6B6B';
            } else {
                alert('Veuillez remplir tous les champs!');
            }
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

        // Simulation du tri par couleur
        document.getElementById('sortByColor').addEventListener('click', function() {
            const taskList = document.getElementById('taskList');
            const tasks = Array.from(taskList.children);
            
            tasks.sort((a, b) => {
                const colorA = a.style.borderLeftColor;
                const colorB = b.style.borderLeftColor;
                return colorA.localeCompare(colorB);
            });
            
            tasks.forEach(task => taskList.appendChild(task));
            
            // Feedback visuel
            this.style.color = 'white';
            setTimeout(() => {
                this.style.color = '';
            }, 500);
        });
    </script>
</body>
</html>