<x-guest-layout>
    <a class="btn btn-dark" href="{{ url('/') }}" style="margin-left: 80%; position: fixed; top: 2%">Ir a inicio</a>
    <a class="btn btn-dark" href="{{ route('login') }}" style="margin-left: 87%; position: fixed; top: 2%">Ir a logueo</a>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
                <div>
                    <x-label for="nombre" :value="__('Nombre')" />

                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                </div>
                <!-- Apellido -->
                <div>
                    <x-label for="apellido" :value="__('Apellido')" />

                    <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Correo')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!--  Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Direccion')" />

                    <x-input id="address" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required />
                </div>

                <!-- DNI -->
                <div class="mt-4">
                    <x-label for="dni" :value="__('DNI')" />

                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required />
                </div>
                <!--  telefono -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Telefono')" />

                    <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
                </div>
                <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Es usuario de nuestra web?, logueate!') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registro') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
