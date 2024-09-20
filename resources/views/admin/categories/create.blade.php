<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl w-full h-full">
        <div class="container mx-auto p-8">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Kategórie', 'url' => route('categories.index')], ['label' => 'Vytvoriť kategóriu']]" />
            <h1 class="text-4xl font-semibold mb-10 text-center text-gray-800">Vytvoriť novú kategóriu</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-full mb-6" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <!-- Názov kategórie -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Názov kategórie</label>
                    <input type="text" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           value="{{ old('name') }}" required>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-black text-white py-3 px-6 rounded-full hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Vytvoriť kategóriu</button>
                </div>
            </form>
        </div>
    </div>
</x-app>
