<body class="bg-white antialiased text-black overflow-y-visible">
    @include('navbar')
    <h1 class="text-5xl font-extrabold dark:text-white" style="padding-top:30px; margin-left:450px;">Ajoutez une Note</h1>
      <!-- Affichage des erreurs si elles existent -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('note.store') }}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2" style="padding-top:30px; padding-left:250px; padding-right:250px; ";>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="etudiant_id">Etudiant </label>
                <select name="etudiant_id" id="etudiant_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required >
                    <option value="" disabled selected>Choisir un étudiant</option>
                    @foreach ($etudiants as $etudiant)
                        <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}</option>
                    @endforeach
                </select>
                @error('etudiant_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="ec_id">EC</label>
                <select name="ec_id" id="ec_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required >
                    <option value="" disabled selected>Choisir une unité d'enseignement</option>
                    @foreach ($ecs as $ec)
                        <option value="{{ $ec->id }}">{{ $ec->nom }}</option>
                    @endforeach
                </select>
                @error('ec_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="note">Note</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="note" type="number" name="note" placeholder="Note" required value="{{ old('note') }}" max='20'>
                @error('note')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            <div>
                <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="padding-top:20px;"  for="grid-session">Session</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-session" name="session" required >
                    <option value="normale">Normale</option>
                    <option value="rattrapage">Rattrapage</option>
                </select>
                @error('ue_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="padding-top:20px;" for="date_evaluation">Date d'évaluation</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="date_evaluation" type="date" name="date_evaluation" required value="{{ old('date_evaluation') }}">
                @error('date_evaluation')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            <div>     
            <button type="submit" style="margin-top:30px; padding-left:60px; padding-right:60px;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
        </div> 
    </form>
</body>
</html> 