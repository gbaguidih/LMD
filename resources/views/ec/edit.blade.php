<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification d'EC</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Formulaire de modification d'un Élément Constitutif (EC)</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        <form action="{{ route('ec.update', $ec->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-code">Code</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="grid-code" type="text" name="code" placeholder="UExx" required value="{{ old('code', $ec->code) }}">
                @error('code')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-nom">Nom</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="grid-nom" type="text" name="nom" placeholder="Nom de l'UE" required value="{{ old('nom', $ec->nom) }}">
                @error('nom')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-coefficient">Coefficient</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="grid-coefficient" type="number" name="coefficient" placeholder="Coefficient" min="1" max="5" required value="{{ old('coefficient', $ec->coefficient) }}">
                @error('coefficient')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ue_id">Unité d'enseignement</label>
                <select name="ue_id" id="ue_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled>Choisir une unité d'enseignement</option>
                    @foreach ($ues as $ue)
                        <option value="{{ $ue->id }}" @if($ue->id == $ec->ue_id) selected @endif>{{ $ue->nom }}</option>
                    @endforeach
                </select>
                @error('ue_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Modifier
                </button>
            </div>
        </form>
    </main>

</body>
</html>
