<nav class="navbar fixed w-full z-20 top-0 left-0 bg-transparent">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{route('welcome')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img id="logo" src="https://flowbite.com/docs/images/logo.svg" class="h-8 transition-all" alt="Flowbite Logo">
            <span id="navbar-title" class="self-center text-2xl font-semibold whitespace-nowrap text-white">LMD-9</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
                <li>
                    <a href="{{route('etudiant')}}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Etudiant</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">UEs</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">ECs</a>
                </li>
                <li>
                    @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >
                                Dashboard
                            </a>
                        @else
                    </li>
                    <li>
                        <a
                            href="{{ route('login') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                        >
                            Log in  
                        </a>
                    </li>
                    <li>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >
                                Register
                            </a>
                    <li>
                        @endif
                    @endauth
                </nav>
            @endif
            </li>
        </ul>
    </div>
    </div>
</nav>

<script>
  // Lorsque la page est chargée
  document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector('.navbar'); // Sélectionne la navbar
    const logo = document.querySelector('#logo'); // Sélectionne le logo
    const title = document.querySelector('#navbar-title'); // Sélectionne le titre

    // Fonction qui détecte le défilement de la page
    window.onscroll = function () {
      if (window.scrollY > 0) {
        navbar.classList.add('scrolled'); // Ajoute la classe scrolled si la page est défilée
        logo.src = "https://flowbite.com/docs/images/logo.svg"; // Change le logo en version noire
        title.classList.remove('text-white'); // Retire la couleur blanche du titre
        title.classList.add('text-gray-900'); // Change la couleur du titre en gris foncé
      } else {
        navbar.classList.remove('scrolled'); // Retire la classe scrolled quand l'utilisateur revient en haut
        logo.src = "https://flowbite.com/docs/images/logo.svg"; // Remet le logo à sa version originale
        title.classList.remove('text-gray-900'); // Retire la couleur gris foncé du titre
        title.classList.add('text-white'); // Remet la couleur blanche du titre
      }
    };
  });
</script>

<style>
  /* Navbar par défaut (transparente) */
  .navbar {
    transition: background-color 0.3s ease;
  }

  /* Navbar après défilement (fond blanc) */
  .navbar.scrolled {
    background-color: white !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
</style>
