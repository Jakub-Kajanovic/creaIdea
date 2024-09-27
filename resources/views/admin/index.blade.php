<x-app>
    <div class="flex bg-gray-100">
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow py-4 px-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                </div>
            </header>

            <!-- Dashboard content -->
            <main class="flex-1 p-6 bg-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">Počet používateľov</h3>
                        <p class="mt-4 text-2xl font-bold text-gray-900">120</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">Noví používatelia tento týždeň</h3>
                        <p class="mt-4 text-2xl font-bold text-gray-900">15</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700">Počet administrátorov</h3>
                        <p class="mt-4 text-2xl font-bold text-gray-900">5</p>
                    </div>
                </div>

                <!-- Detailed Section -->
                <div class="mt-8 bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Aktivity</h3>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center justify-between">
                            <p class="text-gray-600">Používateľ Jano pridal nového používateľa</p>
                            <span class="text-sm text-gray-500">Pred 2 hodinami</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-600">Používateľ Eva upravil používateľský profil</p>
                            <span class="text-sm text-gray-500">Pred 1 dňom</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-600">Nový administrátor bol pridaný</p>
                            <span class="text-sm text-gray-500">Pred 3 dňami</span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app>
