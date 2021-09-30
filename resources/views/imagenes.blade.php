
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
  <div class="">
  <div class="flex flex-col font-san bg-gradient-to-r">
      <div class="container mx-auto px-8">
          <header class="flex flex-col sm:flex-row items-center justify-between py-2 relative bg-blue-400">
              <nav class="hidden md:flex text-lg bg-gradient-to-r items-center">
                  <a href="#" class="text-gray-800 hover:text-gray-50 py-3 px-8">Inicio</a>
                  <a href="{{ route('servicios') }}" class="text-gray-800 hover:text-purple-300 py-3 px-8">Servicios</a>
                  <a href="about.html" class="text-gray-800 hover:text-purple-300 py-3 px-8">Acerca</a>
                  <a href="{{ route('contactos') }}" class="text-gray-800 hover:text-purple-300 py-3 px-8">Contactos</a>
                  <a href="" class="text-gray-800 hover:text-purple-300 py-3 px-8">comprar boleto</a>
                  <a href="{{ route('imagenes') }}" class="text-gray-800 hover:text-purple-300 py-3 px-8">galeria</a>
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
          
              
          </main>
      </div>
  </div>
</div>
<div class="container mx-auto px-4"> 
<H1 class="font-bold text-center text-4xl text-blue-400">vnfubr</H1>
                
                <section class="py-8 px-4">
                  <div class="flex flex-wrap -mx-4">
                    <div class="hidden md:block md:w-1/2 px-4">
                      <div class="h-80 w-100 bg-cover rounded shadow-md" style="background-image: url('imagen/bus2.jpg')"></div>
                    </div>
                    <div class="md:w-1/2 h-auto px-4">
                
                      <div class="md:w-2/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    
                      </div>
                  </div>
                </section>
                          
                <section class="py-8 px-4">
                  <div class="flex flex-wrap -mx-4">
                  <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    
                     </div>
                </section>
                          
                <section class="pt-8 px-4">
                  <div class="flex flex-wrap -mx-4">
                  <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                 
                   </div>
                </section>
                          
                <section class="py-8 px-4">
                  <div class="flex flex-wrap -mx-4 -mb-8">
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus2.jpg') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus.png') }}" class=" mr-3 h-80 w-120" alt=""></div>
                    <div class="md:w-1/4 px-4 mb-8"><img src="{{ asset('imagen/bus.png') }}" class=" mr-3 h-80 w-120" alt=""></div>
                  </div>
                </section>
              </div>
          