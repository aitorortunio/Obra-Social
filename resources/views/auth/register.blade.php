<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        
        @if($afiliado->titular_id != null)
            <form  action="{{ route('registrarMiembro', ['dni' => $afiliado->dni]) }}" method="POST" enctype="multipart/form-data">
            @csrf    
        @else
            <form  action="{{ route('registrarPost', ['dni' => $afiliado->dni]) }}" method="POST" enctype="multipart/form-data">
            @csrf
        @endif
    
            <!-- Name -->
            <div>
                <x-input id="name" class="block mt-1 w-full" type="hidden" name="name" value="{{$afiliado->dni}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="hidden" name="email" value="{{$afiliado->email}}" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                pattern=".{8,}"
                                oninvalid="setCustomValidity('Al menos 8 caracteres')"
                                onchange="try{setCustomValidity('')}catch(e){}"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                oninvalid="setCustomValidity('Al menos 8 caracteres')"
                                onchange="try{setCustomValidity('')}catch(e){}"
                                pattern=".{8,}" required />
            </div>

            @if($afiliado->titular_id != null)
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            @else
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Siguiente paso') }}
                    </x-button>
                </div>
            @endif

        </form>
    </x-auth-card>
</x-guest-layout>
