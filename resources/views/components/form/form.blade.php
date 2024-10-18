@props(['action', 'class' => ' '])
<form action="{{ $action }}" method="POST" class="{{ $class }}" enctype="multipart/form-data">
    @csrf
    {{ $slot }}
</form>
