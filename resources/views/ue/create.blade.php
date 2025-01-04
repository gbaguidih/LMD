<body class="bg-gray-100">
    @include('navbar')
    <h1 class="text-5xl font-extrabold dark:text-white" style="padding-top:30px; padding-bottom:15px; margin-left:250px;">Ajoutez une Unité d'Enseignement (UE)</h1>
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <form action="{{ route('ue.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2" style="padding-top:30px; padding-left:250px; padding-right:250px; ";>
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-code">Code</label>
                    <input type="text" id="grid-code" name="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="UExx" required />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-code">Nom</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-nom" type="text" name="nom" placeholder="Nom de l'UE" required />
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-credits_ects">Credits ECTS</label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-credits_ects" type="number" name="credits_ects" placeholder="Crédits ECTS" min="1" max="30" required />
                </div>  
                <div>
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="grid-state">Semestres</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="grid-state" name="semestre" required >
                        <option value="s1">S1</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                        <option value="s4">S4</option>
                        <option value="s5">S5</option>
                        <option value="s6">S6</option>
                    </select>
                </div>    
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
            </div> 
        </form>
    </main>
</body>
</html>
