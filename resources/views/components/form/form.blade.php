@props(['action', 'class' => ' '])
<form action="{{ $action }}" method="POST" class="{{ $class }}">
    @csrf
    {{ $slot }}
</form>
