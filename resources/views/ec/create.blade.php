<body class="bg-white antialiased text-black overflow-y-visible">
    @include('navbar')
    <h1 class="text-5xl font-extrabold dark:text-white" style="padding-top:30px; margin-left:450px;">Ajoutez un EC</h1>
      <!-- Affichage des erreurs si elles existent -->
    @if ($errors->any())
          <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
          </ul>
    @endif
    <form action="{{ route('ec.store') }}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2" style="padding-top:30px; padding-left:250px; padding-right:250px; ";>
            <div>
                <label for="grid-code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-code" type="text" name="code" placeholder="UExx" required value="{{ old('code') }}"/>
                @error('code')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-nom">Nom</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-nom" type="text" name="nom" placeholder="Nom de l'UE" required value="{{ old('nom') }}">
                @error('nom')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="grid-Coefficient" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coefficient</label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-coefficient" type="number" name="coefficient" placeholder="Coefficient" min="1" max="5" required value="{{ old('coefficient') }}">
                @error('coefficient')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            <div>
                <label  for="ue_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UE</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="ue_id" id="ue_id" required >
                    <option value="" disabled selected>Choisir une unité d'enseignement</option>
                        @foreach ($ues as $ue)
                            <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
                        @endforeach
                </select>
                @error('ue_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>     
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
        </div> 
    </form>
</body>
</html>