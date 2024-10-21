<x-app-layout>
    <div class="pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Produk Kami</div>
            <div>
                <form action="" method="GET" class="d-flex">
                    <input type="text" class="form-control" placeholder="Search..." name="search">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="row mt-4">
            @forelse ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $product->getFirstMediaUrl('products') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                            <p class="card-text text-center">{{ formatCurrency($product->harga) }}</p>
                            <a href="#" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Produk belum tersedia</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
