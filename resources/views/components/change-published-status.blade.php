@props(['item', 'url'])

<div class="form-check form-switch">
    <input class="form-check-input change-published" data-url="{{ $url }}" style="border: 1px solid #5b5a63"
        type="checkbox" role="switch" id="change-published-status-{{ $item->id }}"
        {{ $item->is_published ? 'checked' : '' }}>
    <label class="form-check-label" for="change-published-status-{{ $item->id }}">
        {{ $item->is_published ? 'Published' : 'Not Published' }}
    </label>
</div>
