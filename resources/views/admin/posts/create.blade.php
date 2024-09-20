<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl h-full">
        <div class="container mx-auto p-8 bg-white shadow-md rounded-lg">
            <x-breadcrumbs :breadcrumbs="[
                ['label' => 'Domov', 'url' => route('admin.dashboard')],
                ['label' => 'Posts', 'url' => route('blog.index')],
                ['label' => 'Vytvoriť nový príspevok', 'url' => route('blog.create')],
            ]" />
            <h1 class="text-3xl font-semibold mb-8 text-center text-gray-800">Vytvoriť nový príspevok</h1>

            <!-- Chybové správy -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulár -->
            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Názov -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">Názov</label>
                    <input type="text" name="title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        value="{{ old('title') }}" required>
                </div>

                <!-- Obsah -->
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700">Obsah</label>
                    <textarea name="content" rows="5" id="content"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>{{ old('content') }}</textarea>
                </div>

                <!-- Kategória -->
                <div class="mb-6">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Kategória</label>
                    <select name="category_id"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tagy -->
                <div class="mb-6">
                    <label for="tags" class="block text-sm font-medium text-gray-700">Tagy</label>
                    <select name="tags[]" multiple
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Obrázok -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Obrázok</label>
                    <input type="file" name="image"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Tlačidlo na odoslanie -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full bg-black text-white font-semibold py-3 px-4 rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        Vytvoriť príspevok
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app>
