@if(isset($breadcrumbs))
    <nav class="text-sm font-medium my-4">
        <ol class="list-reset flex text-gray-800 text-sm">
            @foreach($breadcrumbs as $breadcrumb)
                @if (!$loop->last)
                    <li>
                        <a href="{{ $breadcrumb['url'] }}" class="text-gray-800 hover:text-gray-900 transition-colors duration-200">{{ $breadcrumb['label'] }}</a>
                        <span class="mx-2 text-gray-400">|</span>
                    </li>
                @else
                    <li class="text-gray-800">{{ $breadcrumb['label'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
