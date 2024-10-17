<x-form.input id="published" label="Kode" name="kode" :value="old('kode', @$product->kode)" placeholder="Kode Produk..." />
<x-form.input id="name" label="Name" name="name" :value="old('name', @$product->name)"  placeholder="Produk Name" />
<x-form.input id="qty" label="qty" name="qty" :value="old('qty', @$product->qty)" placeholder="Total Qty..." />
<x-form.input id="produk_kategori" label="produk_kategori" name="produk_kategori" :value="old('produk_kategori', @$product->produk_kategori)" placeholder="Produk Kategori..." />
<x-form.input id="harga" label="harga" type="number" name="harga" :value="old('harga', @$product->harga)" placeholder="harga Produk..." />
{{-- <div class="mb-3">
    <label for="published">published</label>
    <input type="radio" name="published" id="published">
    <input type="radio" name="published" id="published">
</div> --}}
