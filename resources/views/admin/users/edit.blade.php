<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl h-full">
        <div class="container mx-auto p-8 bg-white shadow-md rounded-lg">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Používatelia', 'url' => route('users.index')], ['label' => 'Upraviť používateľa']]" />
            <h1 class="text-3xl font-semibold mb-8 text-center text-gray-800">Upraviť používateľa</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Meno -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Meno</label>
                    <input type="text" name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('email', $user->email) }}" required>
                </div>

                <!-- Nové heslo -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Nové heslo (nepovinné)</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Zadajte nové heslo, ak ho chcete zmeniť">
                        <!-- Ikona/tlačidlo na zobrazenie/skrývanie hesla -->
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5" onclick="togglePassword('password')">
                            <svg class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-7.5a9 9 0 017.481 13.155l-.323.571a9 9 0 01-15.319 0l-.323-.571A9 9 0 0112 4.5z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Admin -->
                <div class="mb-6 flex items-center">
                    <!-- Skrytý input na odoslanie hodnoty false (0), ak checkbox nie je zakliknutý -->
                    <input type="hidden" name="is_admin" value="0">
                    <input type="checkbox" name="is_admin" id="is_admin" value="1"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                    <label for="is_admin" class="ml-2 block text-sm text-gray-900">Admin používateľ</label>
                </div>

                <!-- Tlačidlo na odoslanie -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full bg-black text-white font-semibold py-3 px-4 rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        Aktualizovať používateľa
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            if (field.type === 'password') {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        }
    </script>
</x-app>
