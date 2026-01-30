<!DOCTYPE html>
<html>
<head><title>Tasques</title></head>
<body>
    <h1>Llistat de Tasques</h1>
    <form action="/categories" method="GET">
        <button type="submit">Anar a Categories</button>
    </form>
    <hr>

    <h2>Nova Tasca</h2>
    <form action="/tasks/guardar" method="POST">
        @csrf
        <input type="text" name="titol" placeholder="Títol de la tasca...">
        <select name="category_id" >
            @foreach ($totesLesCategories as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
        <button type="submit">Afegir</button>
    </form>

    <hr>
    <ul>
        @foreach ($totesLesTasques as $task)
            <li>
                <form action="/tasks/actualitzar/{{ $task->id }}" method="POST" style="display:inline-flex;">
                    @csrf @method('PUT')
                    <input type="text" name="titol" value="{{ $task->titol }}">
                    
                    <select name="category_id">
                        @foreach ($totesLesCategories as $cat)
                            <option value="{{ $cat->id }}" @selected($task->category_id === $cat->id)>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Actualitzar</button>
                </form>

                <form action="/tasks/eliminar/{{ $task->id }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
            <hr>
        @endforeach
    </ul>
</body>
</html>