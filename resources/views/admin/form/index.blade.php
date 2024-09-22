<x-app>
    <div class="flex items-center justify-center bg-gray-50 rounded-2xl w-full h-full">
        <div class="container mx-auto p-8">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('admin.dashboard')], ['label' => 'Správy', 'url' => route('admin.form-submissions')]]" />
            <h1 class="text-4xl font-semibold mb-10 text-center text-gray-800">Všetky správy</h1>

            <div class="shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full leading-normal bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Meno
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                E-mail
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Mobil
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Správa
                            </th>
                            <th class="px-6 py-4 border-b-2 border-gray-200 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                Akcie
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($submissions as $submission)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $submission->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $submission->email }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $submission->phone }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-gray-900 text-lg">
                                    {{ $submission->message }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-right">
                                    <form action="{{ route('admin.form-submissions.destroy', $submission->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Zmazať</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-600">Žiadne správy nenájdené.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="py-6 flex justify-center">
                    {{ $submissions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app>
