@props(['id', 'label', 'type' => 'text', 'name', 'value' => '', 'placeholder' => '', 'isInvalid' => false])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" class="form-control" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}">
    {{ $slot }}
</div>
