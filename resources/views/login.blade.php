<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="hidden bg-cover lg:block lg:w-2/3 rounded-tr-2xl rounded-br-2xl shadow-2xl" style="background-image: url(https://images.unsplash.com/photo-1505663912202-ac22d4cb3707?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80)">
        <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40" id="cita">
            <template id="template-cita">
                <div>
                    <h2 class="text-4xl font-bold text-white"></h2>
                    
                    <p class="max-w-xl mt-3 text-gray-300"></p>
                </div>
            </template>
        </div>
    </div>
    
    <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
        <div class="flex-1">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-center text-white">Bienvenido</h2>
                
                <p class="mt-3 text-gray-300">Inicia sesión para acceder a tu cuenta.</p>
            </div>

            <div class="mt-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-input-label for="email" class="block mb-2 text-sm text-gray-200" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full px-4 py-2 mt-2rounded-md placeholder-gray-600 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                    
                        <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-200" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        class="block w-full px-4 py-2 mt-2 border rounded-md placeholder-gray-600 bg-gray-900 text-gray-300 border-gray-700 focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-blue-800 shadow-sm  focus:ring-blutext-blue-800 focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-400">{{ __('Recuérdame') }}</span>
                        </label>
                    </div>

                    <div class="mt-6">
                        {{-- @if (Route::has('password.request'))
                            <a class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}

                        <x-primary-button>
                            {{ __('Log in') }}
                        </x-primary-button>
                        
                    </div>

                </form>


            </div>
        </div>
    </div>

    @section('scriptslogin')
    <script>
        const cards = document.getElementById('cita');
        const templateCard = document.getElementById('template-cita').content;
        const fragment = document.createDocumentFragment();

        document.addEventListener('DOMContentLoaded', () => {
            fetchData()
        });

        function aleatorioNumero(min, max){
            return Math.floor(Math.random() * (max - min) + min);
        }
        let frase = aleatorioNumero(0, 31);
        const fetchData = async () => {
            try {
                const res = await fetch('json/Api.json');
                const data = await res.json();
                insertCard(data);
            } catch(error) {
                console.log(error);
            }
        }

        const insertCard = data => {
            data.forEach(element => {
                templateCard.querySelector('h2').textContent = element.name;
                templateCard.querySelector('p').textContent = element.cita;
                
                if (element.id == frase) {
                    const clone = templateCard.cloneNode(true);
                    fragment.appendChild(clone);
                    cards.appendChild(fragment); 
                }
            });
        }
    </script>
    @endsection
</x-guest-layout>
