<x-guest-layout>
    <x-jet-authentication-card>
    <!--
      @push('styles')
        <style>
            .titulo{
              color:#111827;
              text-shadow: 2px 2px 5px #F59E0B;
            }
        </style>
      @endpush

      <h2 class="mt-6 text-3xl font-extrabold leading-2 text-center text-gray-900 titulo">Bienvenido</h2>
   <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        
    -->        
    <h1 class="font-bold text-center md:text-3xl text-2xl text-gray-900 align-top">Empresa de Transporte Expreso Tarija</h1>
       
            <x-jet-validation-errors class="mb-4" />
            
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-gray-900 ">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
       
            <div div class="flex flex-col p-10 rounded-lg  space-y-6 bg-gradient-to-r from-yellow-400 via-red-400 to-pink-500 shadow-2xl">
                <h1 class="font-bold text-center md:text-1xl text-2xl text-gray-900 align-top">Inicio de Sesion</h1>
       
                @csrf
       
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-900">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-900 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
  </x-jet-authentication-card>
</x-guest-layout>
