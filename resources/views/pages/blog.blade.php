<x-layout>
    <div class="flex flex-col items-center py-10">
        <h2>blog</h2>
        <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('home')], ['label' => 'Blog', 'url' => route('blog')]]" />
    </div>
    <section data-aos="fade-up" class="flex lg:flex-row md:flex-row flex-col-reverse border border-t-black py-20 gap-10">
        <div class="flex flex-col w-full">
            @foreach ($posts as $post)
                <a class="group" href="{{ route('post.show', $post->slug) }}">
                    <div class="border border-gray-400/60 max-w-4xl mb-10">
                        <img class="w-fit h-fit max-w-3xl max-h-auto flex" src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}">
                        <div class="p-10 flex flex-row justify-between">
                            <div class="flex flex-row text-nowrap items-center gap-2"><img
                                    src="{{ asset('images/user-icon.svg') }}" alt="User icon svg on black background">
                                <p class="text-black text-sm">by Gabika</p>
                            </div>
                            <span class="px-5 py-3 flex flex-row gap-2 bg-black text-white"><img
                                    src="{{ asset('images/calendar.svg') }}"
                                    alt="">{{ $post->created_at->format('Y-m-d') }}</span>
                        </div>
                        <div class="flex flex-col gap-3 p-10">
                            <h2 class="group-hover:underline">{{ $post->title }}</h2>
                            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
            <div class="mt-6">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <div class="flex flex-col lg:w-2/3 md:w-2/3 w-full gap-10">
            <div class="border-2 border-white px-10 py-6">
                <h3><span class="border-b border-black pb-2">Se</span>arch</h3>
                <form action="{{ route('blog') }}" method="GET" class=" pt-6 flex flex-row items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Hľadať príspevky..."
                        class="px-4 py-4 w-full focus:outline-none focus-within:outline-none focus:ring-0">
                    <button type="submit" class="rounded-none py-4">Vyhľadávať</button>
                </form>
            </div>
            <div class="border-2 border-white px-10 py-6">
                <h3><span class="border-b border-black pb-2">Fo</span>llow us</h3>
                <div class="flex flex-row space-x-2 pt-6">
                    <a href="https://www.facebook.com/profile.php?id=61563497834690" target="_blank"
                        class="border border-white px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                            class='bx bxl-facebook group-hover:text-white text-xl'></i></a>
                    <a href="https://www.linkedin.com/in/gabriela-kederov%C3%A1-9336306a/" target="_blank"
                        class="border border-white px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                            class='bx bxl-linkedin group-hover:text-white text-xl'></i></a>
                    <a href="https://www.instagram.com/creaidea.sk/" target="_blank"
                        class="border border-white px-3 py-3 rounded-full pointer group hover:bg-black transition-all duration-300 flex flex-row items-center"><i
                            class='bx bxl-instagram group-hover:text-white text-xl'></i></a>
                </div>
            </div>
            <div class="border-2 border-white px-10 py-6">
                <h3><span class="border-b border-black pb-2">Ca</span>tegories</h3>
                <div class="pt-6">
                    @foreach ($categories as $category)
                        <ul>
                            <li class="border-b border-white py-2">
                                <a href="{{ route('blog', ['category_id' => $category->id]) }}"
                                    class="flex flex-row justify-between">
                                    {{ $category->name }} <span>({{ $category->posts_count }})</span>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="border-2 border-white px-10 py-6">
                <h3><span class="border-b border-black pb-2">Ta</span>g</h3>
                <div class="mt-6 py-6">
                    @foreach ($tags as $tag)
                    <x-tag :tag="$tag" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
