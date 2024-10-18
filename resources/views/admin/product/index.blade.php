<x-app-layout>
    <div class=" pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Master Data Product</div>
            <div>
                <a href="#" class="btn btn-secondary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg>
                    Refresh
                </a>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Add Product
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <form action="" method="get">
                            <div class="text-dark fw-bold d-flex align-items-center">
                                <!-- Dropdown Tipe Produk -->
                                <div class="me-3">
                                    <select class="form-select" name="product_type" id="productTypeDropdown">
                                        <option value="">Select Tipe Produk</option>
                                        <option value="type1">Type 1</option>
                                        <option value="type2">Type 2</option>
                                        <option value="type3">Type 3</option>
                                    </select>
                                </div>

                                <!-- Dropdown Kategori -->
                                <div class="me-3">
                                    <select class="form-select" name="category" id="categoryDropdown">
                                        <option value="">Select Kategori</option>
                                        <option value="category1">Category 1</option>
                                        <option value="category2">Category 2</option>
                                        <option value="category3">Category 3</option>
                                    </select>
                                </div>

                                <!-- Dropdown Level -->
                                <div class="me-3">
                                    <select class="form-select" name="level" id="levelDropdown">
                                        <option value="">Select Level</option>
                                        <option value="beginner">Beginner</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="advanced">Advanced</option>
                                    </select>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>

                        <!-- Pencarian -->
                        <form action="" method="GET" class="d-flex">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <button type="submit" class="btn btn-primary ms-2"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-dark mb-0">
                            <thead class="table-secondary text-dark fw-bold">
                                <tr>
                                    <th class="col">#</th>
                                    <th class="col">ID</th>
                                    <th class="col">nama</th>
                                    <th class="col">Harga</th>
                                    <th class="col">Gambar</th>
                                    <th class="col">Published</th>
                                    <th class="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->harga }}</td>
                                        <td>
                                            @if($product->hasMedia())
                                                <img src="{{ $product->getFirstMediaUrl() }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $product->published }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{ route('admin.products.destroy', $product->id) }}"
                                                class="btn btn-danger" data-sweetalert-delete data-title="Delete!"
                                                data-text="Are you sure you want to delete {{ $product->name }}?"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Produk Belom tersedia</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
