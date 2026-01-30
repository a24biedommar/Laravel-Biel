<!DOCTYPE html>
<html>
<head><title>Categories</title></head>
<body>
    <h1>Gestió de Categories</h1>
    <form action="/tasks" method="GET" style="display:inline">
        <button type="submit">Anar a Tasques</button>
    </form>
    <hr>

    <h2>Nova categoria</h2>
    <form action="/categories/guardar" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nom...">
        <button type="submit">Crear</button>
    </form>

    <hr>

    <ul>
        @forelse ($totesLesCategories as $category)
            <li>
                <b>{{ $category->name }}</b>
                <form action="/categories/{{ $category->id }}" method="GET" style="display:inline">
                    <button type="submit">Editar</button>
                </form>
                
                <form action="/categories/eliminar/{{ $category->id }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @empty
            <li>No hi ha categories.</li>
        @endforelse
    </ul>
</body>
</html>