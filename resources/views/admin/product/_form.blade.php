<x-form.input id="name" label="Name" name="name" :value="old('name', @$product->name)" placeholder="Produk Name" />
<x-form.input id="harga" label="harga" type="number" name="harga" :value="old('harga', @$product->harga)" placeholder="harga Produk..." />
<x-form.input id="gambar" label="gambar" type="file" name="gambar" :value="old('gambar')" />

@if (isset($product))
    <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}"
        style="max-width: 100px; max-height: 100px;">
@endif


<div class="me-3">
    <label for="published" class="form-label me-3">Published :</label>
    @foreach (\App\Enums\PublishedEnum::asSelectArray() as $key => $item)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="published_{{ $key }}" name="is_published"
                value="{{ $key }}" {{ old('published', @$product->is_published) == $key ? 'checked' : '' }}>
            <label class="form-check-label" for="published_{{ $key }}">
                {{ $item }}
            </label>
        </div>
    @endforeach
</div>
