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
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('products.show', $product->id) }}">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-img-top" style="position: relative; height: 250px; overflow: hidden;">
                                <img src="{{ $product->getFirstMediaUrl('products') }}"
                                    style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $product->name }}">
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="card-text text-muted" style="font-size: 0.9rem;">
                                    {{-- {{ Str::limit($product->description, 50, '...') }} --}}
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A vel quae sit aut
                                    explicabo
                                    dicta, ipsa iste fugiat natus asperiores quia, nihil obcaecati veniam et aperiam
                                    harum
                                    reprehenderit aliquid debitis?
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span
                                        class="text-primary font-weight-bold">{{ formatCurrency($product->harga) }}</span>
                                    <a href="{{ route('products.order.create', $product->id) }}" class="btn btn-primary">Beli</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Produk belum tersedia</p>
                </div>
            @endforelse
        </div>


    </div>
</x-app-layout>
