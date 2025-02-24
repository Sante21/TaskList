<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4697/4697260.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-5">Crear Nueva Tarea</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="@if(isset($task))/editTask/{{$task->id}} @else /store @endif" method="POST">
                @csrf
                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        value="@if(isset($task)) {{ $task->title }} @endif" required>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">@if (isset($task)){{ $task->description }}@endif</textarea>
                </div>

                <!-- Campo Fecha Límite -->
                <div class="mb-4">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Fecha Límite</label>

                    @if (isset($task))
                        <input type="date" name="due_date" id="due_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            value="{{ $task->date }}">
                    @else
                        <input type="date" name="due_date" id="due_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            value="">
                    @endif
                </div>

                <!-- Campo Prioridad -->
                <div class="mb-4">
                    <label for="asignto" class="block text-sm font-medium text-gray-700">Responsable</label>
                    <select name="asignto" id="asignto"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                        <option value="" selected>Selecciona el responsable</option>
                        <option value="Iker" {{ (isset ($task)) && $task->asignto == 'Iker' ? 'selected' : '' }}>Iker</option>
                        <option value="Angel" {{ (isset ($task)) && $task->asignto == 'Angel' ? 'selected' : '' }}>Angel</option>
                        <option value="Guillem" {{ (isset ($task)) && $task->asignto == 'Guillem' ? 'selected' : '' }}>Guillem
                        </option>
                    </select>
                </div>

                <!-- Campo Prioridad -->
                <div class="mb-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700">Prioridad</label>
                    <select name="priority" id="priority"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                        <option value="" selected>Selecciona la prioridad</option>
                        <option value="1" {{ (isset ($task)) && $task->priority == 1 ? 'selected' : '' }}>Baja</option>
                        <option value="2" {{ (isset ($task)) && $task->priority == 2 ? 'selected' : '' }}>Media</option>
                        <option value="3" {{ (isset ($task)) && $task->priority == 3 ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <!-- Botón de Envío -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">
                        Guardar Tarea
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
