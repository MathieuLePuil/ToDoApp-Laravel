<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
<h1>To-Do List</h1>

<!-- Afficher le message de succès -->
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('tasks.create') }}">Ajouter une nouvelle tâche</a>

<ul>
    @foreach($tasks as $task)
        <li>
            {{ $task->title }} - {{ $task->description }}
            <a href="{{ route('tasks.edit', $task->id) }}">Modifier</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
