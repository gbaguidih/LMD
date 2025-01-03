<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification de la note</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Formulaire de modification d'une note</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('note.update', $note->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-full">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="etudiant_id">Unité d'enseignement</label>
                <select name="etudiant_id" id="etudiant_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled>Choisir un etudiant</option>
                    @foreach ($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}" @if($etudiant->id == $note->etudiant_id) selected @endif>{{ $etudiant->nom }}</option>
                    @endforeach
                </select>
                @error('etudiant_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div> 
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="ec_id">Ec</label>
                <select name="ec_id" id="ue_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled>Choisir une unité d'enseignement</option>
                    @foreach ($ecs as $ec)
                        <option value="{{ $ec->id }}" @if($ec->id == $note->ec_id) selected @endif>{{ $ec->nom }}</option>
                    @endforeach
                </select>
                @error('ec_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-note">Note</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="grid-note" type="number" name="note" placeholder="Note" required value="{{ old('note', $note->note) }}">
                @error('note')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-session">Session</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-session" name="session" required>
                    <option value="normale" {{ $note->session == 'normale' ? 'selected' : '' }}>Normale</option>
                    <option value="rattrapage" {{ $note->session == 'rattrapage' ? 'selected' : '' }}>Rattrapage</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-date_evaluation">Date evaluation</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                       id="grid-date_evaluation" type="date" name="date_evaluation" placeholder="Date evaluation"  required value="{{ old('date_evaluation', $note->date_evaluation) }}">
                @error('date_evaluation')
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
