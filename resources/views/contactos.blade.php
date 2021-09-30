<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>pagina web</title>
</head>
<body>
  <div>
    <h1 class="font-bold text-center text-4xl text-blue-400">EXPRESO TARIJA</h1>
  </div>
            <!-- component -->
            
<div class="">
  <div class="flex flex-col font-san bg-gradient-to-r">
      <div class="container mx-auto px-8">
          <header class="flex flex-col sm:flex-row items-center justify-between py-2 relative bg-yellow-600">
              <nav class="hidden md:flex text-lg bg-gradient-to-r items-center">
                  <a href="#" class="text-gray-800 hover:text-gray-50 py-3 px-8">Inicio</a>
                  <a href="{{ route('servicios') }}" class="text-gray-800 hover:text-purple-300 py-3 px-8">Servicios</a>
                  <a href="about.html" class="text-gray-800 hover:text-purple-300 py-3 px-8">Acerca</a>
                  <a href="{{ route('contactos') }}" class="text-gray-800 hover:text-purple-300 py-3 px-8">Contactos</a>
                  <a href="{{ route('login') }}" class="text-gray-800 hover:text-purple-900 py-3 px-8">Iniciar Sesion</a>
                  <a href="{{ url('/register') }}"  class="text-gray-800 hover:text-purple-900 py-3 px-8">Registrate</a>
              </nav>
              <button class="flex md:hidden flex-col absolute top-0 right-0 p-4 mt-5">
                  <span class="w-5 h-px mb-1 bg-orange-500"> ghg</span>
                  <span class="w-5 h-px mb-1 bg-orange-500"></span>
                  <span class="w-5 h-px mb-1 bg-orange-500"></span>
              </button>
          </header>

          <main class="flex flex-col-reverse sm:flex-row jusitfy-between items-center py-12">
          
              <div class="mb-16 sm:mb-0 mt-8 sm:mt-0 sm:w-3/5 sm:pl-20">
                  <img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt="">
              </div>
              <div class="sm:w-2/5 flex flex-col items-center sm:items-start text-center sm:text-left">
                  <h1 class="uppercase text-6xl text-purple-900 font-bold leading-none tracking-wide mb-2">COMODIDAD Y ENTRETENIMIENTO</h1>
                  <h2 class="uppercase text-4xl text-orange-500 text-secondary tracking-widest mb-6">Potosi</h2>
                  <p class="text-gray-600 leading-relaxed mb-12">Los mas veloces del lugar.</p>
                  <a href="faq.html" class="bg-purple-300 hover:bg-purple-400 py-3 px-6 uppercase text-lg font-bold text-white rounded-full animate-bounce">Reservar Pasaje</a>
              </div>
          </main>
      </div>
  </div>
</div>

<div class="bg-gradient-to-r from-yellow-400 via-pink-500 to-red-500 ...">
      
<footer class="text-gray-600 body-font">
  <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
    <img class="text-1xl font-bold uppercase text-purple-100 h-20 w-20 rounded-full" src="{{ asset('imagen/logobus.jpg') }}"  width="50" height="10"></img>
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Expreso Tarija</span>
    </a>
    <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2021
      <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank"></a>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <a class="text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
      
    </span>
    
  </div>
</footer>
</div>
</body>
</html>
