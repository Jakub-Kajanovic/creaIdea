<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl w-full  h-full">
        <div class="container mx-auto p-8">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Posts', 'url' => route('blog.index')]]" />
            <h1 class="text-4xl font-semibold mb-10 text-center text-gray-800">Všetky príspevky</h1>

            <div class="flex justify-center mb-10">
                <a href="{{ route('blog.create') }}" class="bg-black hover:bg-gray-900 text-white font-semibold py-3 px-6 rounded-full">
                    Vytvoriť nový príspevok
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-full mb-10 text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Minimalistická tabuľka -->
            <div class="shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full leading-normal bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Názov
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Kategória
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Akcie
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    @if ($post->category)
                                    {{ $post->category->name }}
                                @else
                                    <span>Bez kategórie</span>
                                @endif
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-right">
                                    <a href="{{ route('blog.edit', $post->slug) }}" class="text-blue-600 hover:text-blue-900 font-semibold">Upraviť</a>
                                    <form action="{{ route('blog.destroy', $post->slug) }}" method="POST" style="display:inline;">
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
