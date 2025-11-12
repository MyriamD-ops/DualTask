 <!-- Liste des tâches -->
  <form action="{{ route('task.update', $task->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="text" name="title" value="{{ $task->title }}">
    <button type="submit">Mettre à jour</button>
</form>
                   
 <div class="glass-effect rounded-2xl p-6 shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-white">Mes Tâches</h2>
                <div class="flex space-x-2">
                    <button type="submit" class="text-white/70 hover:text-white transition-colors" id="sortByColor">
                        <i class="fas fa-palette"></i>
                    </button>
                    <button type="submit" class="text-white/70 hover:text-white transition-colors">
                        <i class="fas fa-sort"></i>
                    </button>
                </div>
            </div>

            <div id="taskedit" class="space-y-3">