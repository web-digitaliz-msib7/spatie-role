@props(['type' => 'submit', 'class' => 'btn btn-primary'])

    <button type="{{ $type }}" class="{{ $class }}">
        {{ $slot }}
    </button>

