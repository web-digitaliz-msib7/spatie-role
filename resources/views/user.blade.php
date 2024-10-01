<x-app-layout>
    @push('styles')
        <style>
            .text-symbol {
                color: var(--bs-primary);
            }
        </style>
    @endpush

    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h3 class="mb-0 fw-bold text-white">Spatie Role</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <h1 class="fw-semi-bold text-center">User</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
