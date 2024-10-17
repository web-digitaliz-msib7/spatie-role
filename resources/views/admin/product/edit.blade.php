<x-app-layout>
    <div class=" pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Create Product</div>
            <div>
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-6 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <x-form.form action="{{ route('admin.products.update', $product->id) }}" class="w-100">
                            @method('put')
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <x-alert.error-validation />
                                    @include('admin.product._form')
                                </div>

                                <div class="col-12 mt-4 text-center">
                                    <a
                                        href="{{ route('admin.products.index') }}"class="btn btn-dark-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
                                </div>
                            </div>
                        </x-form.form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
