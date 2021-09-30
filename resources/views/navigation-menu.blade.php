<nav x-data="{ open: false }" class="bg-yellow-500 border-b border-gray-500">
    <!-- Primary Navigation Menu -->
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex ">
                    <!-- INICIO DE MENU -->                  
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('dashboard') }}"  :active="request()->routeIs('dashboard')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span>Inicio</span> 
                    </x-jet-nav-link>
                     @if(Auth::user()->rol == 'administrador') 
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> 
                        <span> Usuarios </span>
                    </x-jet-nav-link>
                      @endif 

                   {{-- @if(Auth::user()->rol == 'administrador') --}}
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('buses') }}"  :active="request()->routeIs('buses')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M27.945,9.88h-.35V9.6a1.6339,1.6339,0,0,0-1.36-1.48.3334.3334,0,0,0-.15-.03h-.27V7.3a1.8478,1.8478,0,0,0-1.84-1.84H8.025A1.8413,1.8413,0,0,0,6.185,7.3v.79h-.28a.4014.4014,0,0,0-.15.03A1.6444,1.6444,0,0,0,4.395,9.6v.28h-.35a.337.337,0,0,0-.34.34v4.06a.3373.3373,0,0,0,.34.34h1.38a.346.346,0,0,0,.35-.34V10.22a.3457.3457,0,0,0-.35-.34h-.34V9.6c0-.45.55-.83,1-.83h.1V22.94a1.8316,1.8316,0,0,0,1.63,1.82v.67a1.1161,1.1161,0,0,0,1.12,1.11h2.24a1.1139,1.1139,0,0,0,1.11-1.11v-.65h7.56v.65a1.114,1.114,0,0,0,1.11,1.11h2.25a1.1139,1.1139,0,0,0,1.11-1.11v-.68a1.8458,1.8458,0,0,0,1.5-1.81V8.77h.09c.46,0,1.01.38,1.01.83v.28h-.35a.337.337,0,0,0-.34.34v4.06a.3373.3373,0,0,0,.34.34h1.38a.346.346,0,0,0,.35-.34V10.22A.3457.3457,0,0,0,27.945,9.88Zm-22.86,4.06h-.7V10.56h.7Zm1.78,6.65h1.77a1.4829,1.4829,0,0,0-.24.81,1.5425,1.5425,0,0,0,.24.82h-1.77Zm4.74,4.84a.4333.4333,0,0,1-.43.43H8.935a.4335.4335,0,0,1-.43-.43v-.65h3.1Zm12.03,0a.4333.4333,0,0,1-.43.43h-2.25a.4314.4314,0,0,1-.42-.43v-.65h3.1Zm1.5-3.21h-1.78a1.4671,1.4671,0,0,0,.25-.82,1.4115,1.4115,0,0,0-.25-.81h1.78Zm0-2.31h-3.03a1.4951,1.4951,0,0,0,0,2.99h3.03v.04a1.1608,1.1608,0,0,1-1.16,1.16H8.025a1.1608,1.1608,0,0,1-1.16-1.16V22.9h3.02a1.4951,1.4951,0,1,0,0-2.99h-3.02V16.34l2.3.91a.506.506,0,0,0,.13.02h13.41a.5011.5011,0,0,0,.12-.02l2.31-.91Zm-2.21,1.49a.8236.8236,0,0,1-.82.82.815.815,0,0,1-.81-.82.8065.8065,0,0,1,.81-.81A.8151.8151,0,0,1,22.925,21.4Zm-13.85,0a.8151.8151,0,0,1,1.63,0,.8151.8151,0,1,1-1.63,0Zm8.99-4.81a2.1447,2.1447,0,0,1,4.24,0Zm7.07-.98-2.16.84a2.8235,2.8235,0,0,0-5.59.14h-8.03l-2.49-.98V8.77h18.27Zm0-7.52H6.8649V7.3a1.1522,1.1522,0,0,1,1.16-1.15h15.95a1.1522,1.1522,0,0,1,1.16,1.15Zm2.47,5.85h-.7V10.56h.7Z"/><path d="M10.3745,7.5h3.28a.3408.3408,0,1,0,0-.6816h-3.28a.3408.3408,0,1,0,0,.6816Z"/><path d="M8.7621,7.6307A.4718.4718,0,1,0,8.29,7.1588.4718.4718,0,0,0,8.7621,7.6307Z"/><path d="M12.8779,18.7535a.341.341,0,0,0-.3413.3409v3.5468a.3413.3413,0,0,0,.6826,0V19.0944A.341.341,0,0,0,12.8779,18.7535Z"/><path d="M14.9584,18.7535a.341.341,0,0,0-.3413.3409v3.5468a.3413.3413,0,0,0,.6826,0V19.0944A.341.341,0,0,0,14.9584,18.7535Z"/><path d="M17.0385,18.7535a.341.341,0,0,0-.3413.3409v3.5468a.3413.3413,0,0,0,.6826,0V19.0944A.341.341,0,0,0,17.0385,18.7535Z"/><path d="M19.1191,18.7535a.341.341,0,0,0-.3413.3409v3.5468a.3413.3413,0,0,0,.6826,0V19.0944A.341.341,0,0,0,19.1191,18.7535Z"/><path d="M11.0444,12.5934a.3352.3352,0,0,0,.1792-.0508l2.6108-1.6152a.3412.3412,0,1,0-.3594-.58l-2.6108,1.6152a.3409.3409,0,0,0,.18.6309Z"/><path d="M12.7045,12.778l-2.5034,1.4736a.3413.3413,0,0,0,.3467.5879l2.5034-1.4737a.3412.3412,0,0,0-.3467-.5878Z"/><path d="M15.185,13.5026l-1.6826.8388a.3416.3416,0,1,0,.3047.6114l1.6826-.8389a.3415.3415,0,0,0-.3047-.6113Z"/></svg>                  
                        <span>Buses</span>
                    </x-jet-nav-link>
                    {{-- @endif --}}

                    {{-- @if(Auth::user()->rol == 'administrador') --}}
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('viajes') }}"  :active="request()->routeIs('viajes')">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>                        
                        <span>Viajes</span>
                    </x-jet-nav-link>
                    {{-- @endif

                    @if(Auth::user()->rol == 'administrador') --}}
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('encomiendas') }}"  :active="request()->routeIs('encomiendas')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>
                        <span>Encomiendas</span>
                    </x-jet-nav-link>
                   {{-- @endif

                    @if(Auth::user()->rol == 'administrador') --}}
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('ventas') }}"  :active="request()->routeIs('ventas')">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                       <span>Ventas</span>
                    </x-jet-nav-link>
                    <x-jet-nav-link class="flex items-center space-x-2" href="{{ route('transacciones') }}" :active="request()->routeIs('transacciones')">
                    	<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    	</svg>
                       	<span>Transacciones</span>
                    </x-jet-nav-link>
                   {{-- @endif --}}
                    <!-- FIN DE MENU -->
                </div>
            </div>
            
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- INICIO MENU RESPONSIVO -->
            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                Inicio
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('usuarios') }}" :active="request()->routeIs('usuarios')">
                Usuarios
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('buses') }}" :active="request()->routeIs('buses')">
                Buses
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('viajes') }}" :active="request()->routeIs('viajes')">
                Viajes
            </x-jet-responsive-nav-link>
            
            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('encomiendas') }}" :active="request()->routeIs('encomiendas')">
                encomiendas
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link class="flex items-center space-x-2" href="{{ route('ventas') }}" :active="request()->routeIs('ventas')">
                Venta
            </x-jet-responsive-nav-link>
            <!--  FIN DE MENU RESPONSIVO -->
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
