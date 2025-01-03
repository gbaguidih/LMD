<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Etudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow p-6">
        <h1 class="text-3xl font-bold text-gray-900">Liste des Etudiants</h1>
        <a href="{{ route('etudiant.create') }}" class="text-blue-500 hover:text-blue-700">Ajouter un Etudiant</a>
    </header>

    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">{{ session('success') }}</p>
        @endif

        <h2 class="text-xl font-semibold mb-4">Voici la liste des Etudiants :</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/4 py-4 px-6 uppercase font-semibold text-sm">Numero etudiant</th>
                        <th class="w-1/4 py-4 px-6 uppercase font-semibold text-sm">Nom</th>
                        <th class="w-1/4 py-4 px-6 uppercase font-semibold text-sm">Prenom</th>
                        <th class="w-1/4 py-4 px-6 uppercase font-semibold text-sm">Niveau</th>
                        <th class="w-1/4 py-4 px-6 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach($etudiants as $etudiant)
                        <tr class="border-b">
                            <td class="w-1/4 py-4 px-6 text-center">{{ $etudiant->numero_etudiant }}</td>
                            <td class="w-1/4 py-4 px-6 text-center">{{ $etudiant->nom }}</td>
                            <td class="w-1/4 py-4 px-6 text-center">{{ $etudiant->prenom }}</td>
                            <td class="w-1/4 py-4 px-6 text-center">{{ $etudiant->niveau }}</td>
                            <td class="w-1/4 py-4 px-6 text-center flex flex-col space-y-2">
                                <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="text-blue-500 hover:text-blue-700">Modifier</a>
                                <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <footer class="bg-black shadow p-6 mt-56">
        <p class="text-center text-white">© Copyright 2024 Système de Gestion des Notes Universitaires - LMD. Tous droits réservés.</p>
    </footer>

</body>
</html>
