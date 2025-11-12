<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        return view ('welcome' , compact('tasks'));
    }

     /* Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('welcome') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' =>'required',
            'tache'=>'required',
          
        ]);
        $validated['user_id']=Auth::id();

        Task::create($validated);
        return redirect()->route('welcome')->with('success' , 'tâche crée avec succès');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    $task = Task::findOrFail($id);
    
    return view('Task.edit', compact('task'));
}

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $task = Task::findOrFail($id);
   
    $task->update($request->validate([
        'tache' => 'required|string|max:255',
    ]));
    return redirect()->route('welcome')->with('success', 'Tâche mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
