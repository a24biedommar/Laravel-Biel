<!DOCTYPE html>
<html>
<head>
    <title>To-Do List Biel Domínguez</title>
</head>
<body>

    <h1>Les meves tasques</h1>

    <hr>

    <h2>Nova tasca</h2>

    <form action="/tasques/guardar" method="POST">
        @csrf
        <input type="text" name="titol" placeholder="Nova tasca..." required>
        <button type="submit">Afegir</button>
    </form>

    <hr>

    <ul>
        @forelse ($totesLesTasques as $tasca)
            <li>{{ $tasca->titol }}</li>
                <ul>
                    <li>
                        Completada: 
                        @if($tasca->completada == 0)
                            No
                        @else
                            Si
                        @endif
                    </li>
                </ul>

                <form action="/tasques/actualitzar/{{ $tasca->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($tasca->completada == 0)
                        <button type="submit">Completada</button>
                    @else
                    <button type="submit">Pendent</button>
                    @endif
                </form>

                <form action="/tasques/eliminar/{{ $tasca->id }}" method="POST">
                    @csrf
                    @method('DELETE') 
                    <button type="submit">Eliminar</button>
                </form>

                <hr>

        @empty
            <li>No hi ha tasques pendents. ¡Bona feina!</li>
        @endforelse
    </ul>

</body>
</html>