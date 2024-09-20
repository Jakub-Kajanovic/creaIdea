<x-layout>
    <div class="flex flex-col items-center py-10">
        <h2>blog</h2>
        <x-breadcrumbs :breadcrumbs="[['label' => 'Domov', 'url' => route('home')], ['label' => 'Blog', 'url' => route('blog')], ['label' => $post->title, 'url' => route('post.show', $post->slug)]]" />
    </div>
    <section data-aos="fade-up" class="flex lg:flex-row md:flex-row flex-col-reverse border border-t-black py-20 gap-10">
        <div class="flex flex-col w-full">
            <article>
                <h2 class="py-4">{{$post->title}}</h2>
                {!! $post->content !!}
                <p class="text-sm uppercase pt-4">Autor článku: {{$post->author->name}}</p>
                <p class="text-sm uppercase">Článok bol vytvorení {{$post->created_at->format('Y-m-d')}}</p>
            </article>
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
        </div>
    </section>
</x-layout>
