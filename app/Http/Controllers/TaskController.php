<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Afficher toutes les tâches
    public function index()
    {
        $tasks = Task::all(); // Récupérer toutes les tâches
        return view('tasks.index', compact('tasks')); // Afficher la vue avec les données des tâches
    }

    // Afficher le formulaire pour créer une nouvelle tâche
    public function create()
    {
        return view('tasks.create'); // Retourne la vue de création de tâche
    }

    // Enregistrer une nouvelle tâche dans la base de données
    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Créer une nouvelle tâche
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    // Afficher le formulaire pour modifier une tâche existante
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Trouver la tâche par ID
        return view('tasks.edit', compact('task')); // Afficher la vue d'édition avec les données de la tâche
    }

    // Mettre à jour une tâche existante dans la base de données
    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Trouver et mettre à jour la tâche
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    // Supprimer une tâche de la base de données
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Trouver la tâche par ID
        $task->delete(); // Supprimer la tâche

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
