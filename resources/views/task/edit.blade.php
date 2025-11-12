 <!-- Formulaire d'ajout  -->
        <div class="glass-effect rounded-2xl p-6 mb-6 shadow-lg">
            <h2 class="text-xl font-semibold text-white mb-4">Ajouter une nouvelle tâche</h2>
            
            
            
            
            
            <form id="taskForm" action="{{route('store')}} " method="POST">
                 @csrf
                <div class="mb-4">
                    <label for="taskName" class="block text-white/80 text-sm mb-2">Nom de la tâche</label>
                    <input type="text" id="tache" name='tache'placeholder="Entrez le nom de la tâche..." 
                           class="w-full bg-white/10 text-white rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-white/30 placeholder-white/60">
                </div>
                
                <div class="mb-4">
                    <label for="taskId" class="block text-white/80 text-sm mb-2">Identifiant</label>
                    <input type="text" id="user_id" name='user_id' placeholder="Entrez l'identifiant" 
                           class="w-full bg-white/10 text-white rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-white/30 placeholder-white/60">
                </div>
                
                
                
                <div class="flex justify-between items-center">
                   
                    
                    <button type="submit" class="btn-primary text-white font-medium py-3 px-6 rounded-xl flex items-center">
                        <i class="fas fa-check mr-2"></i> Valider
                    </button>
                </div>
            </form>
        </div>
