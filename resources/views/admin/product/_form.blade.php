<x-form.input id="name" label="Name" name="name" :value="old('name', @$product->name)"  placeholder="Produk Name" />
<x-form.input id="harga" label="harga" type="number" name="harga" :value="old('harga', @$product->harga)" placeholder="harga Produk..." />
<x-form.input id="gambar" label="gambar" type="file" name="gambar" :value="old('gambar')" />
<x-form.input id="published" label="Published" type="checkbox" name="published" :value="old('published')" />
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
</div>