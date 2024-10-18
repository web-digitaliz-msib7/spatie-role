<x-form.input id="name" label="Name" name="name" :value="old('name', @$product->name)" placeholder="Produk Name" />
<x-form.input id="harga" label="harga" type="number" name="harga" :value="old('harga', @$product->harga)" placeholder="harga Produk..." />
<x-form.input id="gambar" label="gambar" type="file" name="gambar" :value="old('gambar')" />

@if (isset($product))
    <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->name }}"
        style="max-width: 100px; max-height: 100px;">
@endif

<div class="mb-3">
    <label for="">published :</label>
    @foreach (\App\Enums\PublishedEnum::asSelectArray() as $key => $enum)
        <div class="form-check form-check-inline ">
            <input class="form-check-input" type="radio" name="published" id="published_{{ $key }}"
                value="{{ $key }}" {{ old('published', @$item->published) == $key ? 'checked' : '' }}>
            <label class="form-check-label" for="published_{{ $key }}">
                {{ $enum }}
            </label>
        </div>
    @endforeach
</div>
