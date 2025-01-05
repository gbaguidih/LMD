<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une UE</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Modifier une Unité d'Enseignement (UE)</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <form action="{{ route('ue.update', $ue->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-code">Code</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-code" type="text" name="code" value="{{ $ue->code }}" required>
            @error('code')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-nom">Nom</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-nom" type="text" name="nom" value="{{ $ue->nom }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-credits_ects">Crédits ECTS</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-credits_ects" type="number" name="credits_ects" value="{{ $ue->credits_ects }}" min="1" max="30" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-semestre">Semestre</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-semestre" name="semestre" required>
                    <option value="s1" {{ $ue->semestre == 's1' ? 'selected' : '' }}>S1</option>
                    <option value="s2" {{ $ue->semestre == 's2' ? 'selected' : '' }}>S2</option>
                    <option value="s3" {{ $ue->semestre == 's3' ? 'selected' : '' }}>S3</option>
                    <option value="s4" {{ $ue->semestre == 's4' ? 'selected' : '' }}>S4</option>
                    <option value="s5" {{ $ue->semestre == 's5' ? 'selected' : '' }}>S5</option>
                    <option value="s6" {{ $ue->semestre == 's6' ? 'selected' : '' }}>S6</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Mettre à jour
                </button>
            </div>
        </form>
    </main>

</body>
</html>
