<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Etudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Modifier un Etudiant</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-numero_etudiant">Numero etudiant</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-numero_etudiant" type="number" name="numero_etudiant" value="{{ $etudiant->numero_etudiant }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-nom">Nom</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-nom" type="text" name="nom" value="{{ $etudiant->nom }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-prenom">Prenom</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-prenom" type="text" name="prenom" value="{{ $etudiant->prenom }}"  required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-niveau">Niveau</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-niveau" name="niveau" required>
                    <option value="l1" {{ $etudiant->niveau == 'l1' ? 'selected' : '' }}>L1</option>
                    <option value="l2" {{ $etudiant->niveau == 'l2' ? 'selected' : '' }}>L2</option>
                    <option value="l3" {{ $etudiant->niveau == 'l3' ? 'selected' : '' }}>L3</option>
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
