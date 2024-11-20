<x-app-layout>
    <div class="pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Produk Detail</div>
            <div>
                <a href="{{ route('products.index') }}">Kembali</a>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 order-1 order-md-0">
                    <div class="product-image" style="height: 500px; overflow: hidden;">
                        <img src="{{ $product->getFirstMediaUrl('products') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $product->name }}">
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-between order-0 order-md-1" style="height: 500px;">
                    <div>
                        <h2 class="mt-3">{{ $product->name }}</h2>
                        <p class="text-muted mt-3" style="font-size: 1rem;">
                            {{-- {{ $product->description }} --}}
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, facilis veniam eos molestiae vitae harum natus sunt fugiat aliquid? Sit totam maiores molestiae sint aliquid. Sit mollitia nisi sapiente eius.
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h4 class="text-primary mb-0">{{ formatCurrency($product->harga) }}</h4>
                        <a href="{{ route('products.order.create', $product->id) }}" class="btn btn-primary btn-lg">Beli</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
</x-app-layout>
