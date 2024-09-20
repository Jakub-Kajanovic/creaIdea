<x-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold mb-6">Blog</h1>
    
        <!-- Formulár pre vyhľadávanie -->
        <form action="{{ route('blog') }}" method="GET" class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Hľadať príspevky..."
                class="px-4 py-2 border border-gray-300 rounded-lg w-full">
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Vyhľadávať</button>
        </form>
    
        <!-- Kategórie s počtom príspevkov -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold">Kategórie</h2>
            <ul>
                @foreach($categories as $category)
                    <li class="mb-2">
                        <a href="{{ route('blog', ['category_id' => $category->id]) }}" class="text-blue-600">
                            {{ $category->name }} ({{ $category->posts_count }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    
        <!-- Zoznam tagov -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold">Tagy</h2>
            <ul class="flex flex-wrap">
                @foreach($tags as $tag)
                    <li class="mr-4 mb-2">
                        <a href="{{ route('blog', ['tag_id' => $tag->id]) }}" class="bg-gray-200 px-3 py-1 rounded-full text-gray-800">
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
    
        <!-- Zobrazenie príspevkov -->
        @foreach($posts as $post)
            <div class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('post.show', $post->slug) }}" class="text-blue-600">{{ $post->title }}</a>
                </h2>
                <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                <a href="{{ route('post.show', $post->slug) }}" class="text-blue-600">Čítať viac</a>
            </div>
        @endforeach
    
        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
    
</x-layout>

<x-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Názov príspevku -->
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        <!-- Informácie o príspevku (kategória, autor, dátum) -->
        <div class="text-sm text-gray-600 mb-4">
            Kategória:
            <a href="{{ route('blog', ['category_id' => $post->category->id]) }}"
               class="text-blue-600">{{ $post->category->name }}</a> |
            Autor: <span>{{ $post->author->name }}</span> |
            Dátum: <span>{{ $post->created_at->format('d.m.Y') }}</span>
        </div>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto mb-6">
        @endif

        <div class="prose max-w-full">
            {!! $post->content !!}
        </div>

        @if ($post->tags->isNotEmpty())
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Tagy:</h3>
                <ul class="list-inline">
                    @foreach ($post->tags as $tag)
                        <li class="inline-block bg-gray-200 px-3 py-1 rounded-full text-gray-800 mr-2">
                            <a href="{{ route('blog', ['tag_id' => $tag->id]) }}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-10">
            <h2 class="text-2xl font-semibold mb-4">Komentáre</h2>

            @foreach ($post->comments as $comment)
                @if (!$comment->is_hidden)
                    <div class="mb-4 p-4 bg-gray-100 rounded-lg">
                        <p class="text-sm text-gray-500">{{ $comment->user->name }} - {{ $comment->created_at->format('d.m.Y H:i') }}</p>
                        <p>{{ $comment->content }}</p>
                        @if (auth()->check() && (auth()->id() == $comment->user_id || auth()->user()->isAdmin()))
                            <div class="mt-2">
                                <a href="#" class="text-blue-600" onclick="toggleEditForm({{ $comment->id }})">Upraviť</a>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-2">Zmazať</button>
                                </form>
                                <form action="{{ route('comments.update', $comment->id) }}" method="POST" id="edit-comment-form-{{ $comment->id }}" class="mt-4 hidden">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="content" rows="2" class="w-full p-2 border border-gray-300 rounded-lg">{{ $comment->content }}</textarea>
                                    <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded-lg">Uložiť</button>
                                    <button type="button" onclick="toggleEditForm({{ $comment->id }})" class="mt-2 px-4 py-2 bg-gray-600 text-white rounded-lg">Zrušiť</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
        @auth
            <div class="mt-6">
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Napíšte komentár..." required></textarea>
                    <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded-lg">Pridať komentár</button>
                </form>
            </div>
        @else
            <p class="mt-4">Musíte byť prihlásený, aby ste mohli pridať komentár. <a href="{{ route('login') }}" class="text-blue-600">Prihlásiť sa</a></p>
        @endauth
    </div>
    <script>
        function toggleEditForm(commentId) {
            const form = document.getElementById(`edit-comment-form-${commentId}`);
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
            } else {
                form.classList.add('hidden');
            }
        }
    </script>
</x-layout>
