<!-- resources/views/tasks/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une tâche</title>
</head>
<body>
<h1>Modifier la tâche</h1>

<!-- Afficher les erreurs de validation -->
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}" required>

    <label for="description">Description :</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>

    <button type="submit">Mettre à jour la tâche</button>
</form>

<a href="{{ route('tasks.index') }}">Retour à la liste des tâches</a>
</body>
</html>
