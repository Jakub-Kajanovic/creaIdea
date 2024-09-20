<x-app>
    <div class="flex items-center justify-center bg-gray-50 h-full">
        <div class="container max-w-5xl mx-auto p-8">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Používatelia', 'url' => route('users.index')]]" />
            <h1 class="text-3xl font-semibold mb-8 text-center text-gray-800">Všetci používatelia</h1>

            <div class="flex justify-center mb-10">
                <a href="{{ route('users.create') }}"
                    class="bg-black hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-full">
                    Vytvoriť nového používateľa
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-full mb-10 text-center"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Minimalistická tabuľka -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-100">
                        <tr>
                            <th
                                class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Meno
                            </th>
                            <th
                                class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Admin
                            </th>
                            <th
                                class="px-6 py-4 border-b-2 border-gray-200 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Akcie
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $user->is_admin ? 'Áno' : 'Nie' }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-right">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900 font-semibold">Upraviť</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="ml-4 text-red-600 hover:text-red-900 font-semibold">Zmazať</button>
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
