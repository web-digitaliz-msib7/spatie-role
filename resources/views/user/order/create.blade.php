<x-app-layout>
    <div class="pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Produk Kami</div>
            <div>
                <a href="{{ route('products.index') }}">Kembali</a>
            </div>
        </div>
        <x-alert.error-validation />
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('products.order.store', $product->id) }}" method="POST">
                    @csrf

                    <div class="card-img-top" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="{{ $product->getFirstMediaUrl('products') }}"
                            style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $product->name }}">
                    </div>
                    <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter your name">
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email">
                    </div>

                    <!-- Phone -->
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter your phone number">
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"></textarea>
                    </div>

                    <!-- Country -->
                    <div class="form-group mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country"
                            placeholder="Enter your country">
                    </div>

                    <!-- Quantity -->
                    <div class="form-group mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty"
                            placeholder="Enter quantity">
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Create Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
