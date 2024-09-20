<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl w-full h-full">
        <div class="container mx-auto p-8">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Categories', 'url' => route('categories.index')]]" />
            <h1 class="text-4xl font-semibold mb-10 text-center text-gray-800">Všetky kategórie</h1>

            <div class="flex justify-center mb-10">
                <a href="{{ route('categories.create') }}" class="bg-black hover:bg-gray-900 text-white font-semibold py-3 px-6 rounded-full">
                    Vytvoriť novú kategóriu
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-full mb-10 text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full leading-normal bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Kategória
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Akcie
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-right">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Upraviť</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-4 text-red-600 hover:text-red-900 font-semibold">Zmazať</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
