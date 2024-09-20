<a href="{{ $href }}">
    <button {{ $attributes->merge(['class' => '']) }}>

        {{ $slot }}<span class="button-arrow">→</span>
    </button>
</a>
