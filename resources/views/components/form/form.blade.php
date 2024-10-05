@props(['action'])
<form action="{{ $action }}" method="POST">
    @csrf
    {{ $slot }}
</form>
