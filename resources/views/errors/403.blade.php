@include('includes.styles')

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-12">
            <!-- content -->
            <div class="text-center">
                <div class="mb-3">
                    <!-- img -->
                    <img src="{{ asset('assets/images/error/403-error-img.png') }}" alt="403 Forbidden" class="img-fluid">
                </div>
                <!-- text -->
                <h1 class="display-4 fw-bold">Oops! Access Denied.</h1>
                <p class="mb-4">You do not have permission to access this page.</p>
                <!-- button -->
                <a href="javascript:history.back()" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
</div>
