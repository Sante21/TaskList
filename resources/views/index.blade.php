<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4697/4697260.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-300 text-gray-800">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-5">Lista de Tareas</h1>

        <div class="flex justify-end mb-4">
            <a href="http://127.0.0.1:8000/create"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 font-semibold">
                Crear Tarea Nueva
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm text-gray-700 font-bold">Título</th>
                        <th class="px-6 py-3 text-left text-sm text-gray-700 font-bold">Descripción</th>
                        <th class="px-6 py-3 text-left text-sm text-gray-700 font-bold">Completada</th>
                        <th class="px-6 py-3 text-left text-sm text-gray-700 font-bold">Fecha Límite</th>
                        <th class="px-6 py-3 text-left text-sm text-gray-700 font-bold">Acciones</th>
                    </tr>
                </thead>
                @if ($tasks->isEmpty())
                    <tr>
                        <th colspan="6" style="padding: 3mm"> No hay Tareas </th>
                    </tr>
                @else
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $task->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $task->description }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if ($task->completed)
                                        <span class="text-green-400 font-semibold">Si</span>
                                    @else
                                        <span class="text-red-600 font-semibold">No</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $task->date }}</td>

                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-2">
                                        @if ($task->completed)
                                            <a href="/complete/{{ $task->id }}"
                                                class="text-green-600 font-semibold">
                                                Descompletar
                                            </a>
                                        @else
                                            <a href="/complete/{{ $task->id }}"
                                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                Completar
                                            </a>
                                        @endif

                                        <a href="/edit/{{ $task->id }}"
                                            class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                            Editar
                                        </a>

                                        {{-- <a href="/destroy/{{ $task->id }}"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Eliminar
                                        </a> --}}

                                        <form action="/destroy/{{ $task->id }}" method="POST"
                                            onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?');">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
    </div>
</body>

</html>
