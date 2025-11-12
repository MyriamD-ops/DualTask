 <!-- Liste des tâches -->
<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Supprimer cette tâche ?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-white/70 hover:text-white">
        <i class="fas fa-trash"></i>
    </button>
</form>

                    </button>
                    <button type="submit" class="text-white/70 hover:text-white transition-colors">
                        <i class="fas fa-sort"></i>
                    </button>
                </div>
            </div>

            <div id="taskedit" class="space-y-3">