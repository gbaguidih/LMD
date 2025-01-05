<body class="bg-white antialiased text-black overflow-y-visible">
    @include('navbar')
    
      <h1 class="text-5xl font-extrabold dark:text-white" style="padding-top:30px; margin-left:450px;">Ajoutez un Etudiant</h1>

<form action="{{ route('etudiant.store') }}" method="POST">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2" style="padding-top:30px; padding-left:250px; padding-right:250px; ";>
        <div>
            <label for="grid-numero_etudiant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Num Etudiant</label>
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-numero_etudiant" type="number" name="numero_etudiant" placeholder="Numero etudiant" required />
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-nom">Nom</label>
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-nom" type="text" name="nom" placeholder="Nom" required />
        </div>
        <div>
            <label for="grid-prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom(s)</label>
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-prenom" type="text" name="prenom" placeholder="Prenom" required />
        </div>
        <div>
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-niveau">Niveau</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-niveau" name="niveau" required >
                <option value="l1">L1</option>
                <option value="l2">L2</option>
                <option value="l3">L3</option>
            </select>
        </div>     
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
    </div> 
</form>
</body>
</html>