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
                            <h3 class="mb-0 fw-bold text-white">Travel Plan</h3>
                        </div>
                        <div>
                            <button type="button" class="btn btn-white" data-url=""
                                data-title="Create Budget Plan" data-bs-toggle="modal"
                                data-bs-target=".create-plan-modal">
                                Create New Plan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Plan</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                <i class="bi bi-briefcase fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">18</h1>
                            <p class="mb-0"><span class="text-dark me-2">2</span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Budget</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                <i class="bi bi-list-task fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">132</h1>
                            <p class="mb-0"><span class="text-dark me-2">28</span>Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mt-6">
                <!-- card -->
                <div class="card rounded-3">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- heading -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0">Item</h4>
                            </div>
                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-1">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                        </div>
                        <!-- project number -->
                        <div>
                            <h1 class="fw-bold">12</h1>
                            <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white border-bottom-0 py-4">
                        <h4 class="mb-0">your Travel Plans</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="plan" id="plan" class="form-control"
                                        placeholder="Search for travel plans">
                                </div>

                                <div class="col-lg-2">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">-Select Category-</option>
                                    </select>
                                </div>

                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        <!-- table  -->
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Plan</th>
                                        <th>Category</th>
                                        <th>Day</th>
                                        <th>Date</th>
                                        <th>Budget</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Plan</th>
                                                    <th>Category</th>
                                                    <th>Day</th>
                                                    <th>Date</th>
                                                    <th>Budget</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle border-bottom-0">1</td>
                                                    <td class="align-middle border-bottom-0">Marketing Campaign</td>
                                                    <td class="align-middle border-bottom-0">Advertising</td>
                                                    <td class="align-middle border-bottom-0">Monday</td>
                                                    <td class="align-middle border-bottom-0">2024-10-01</td>
                                                    <td class="align-middle border-bottom-0">$1000</td>
                                                    <td class="align-middle border-bottom-0">
                                                        <button type="button" class="btn btn-success btn-sm" data-url="" data-title="Edit Budget Plan"
                                                            data-bs-toggle="modal" data-bs-target=".edit-plan-modal">
                                                            Edit
                                                        </button>

                                                        <a href="" class="btn btn-sm btn-danger" data-sweetalert-delete data-title="Delete!" data-text="Are you sure you want to delete?">
                                                            Hapus
                                                        </a>

                                                        <!-- Button to trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-url="" data-title="Budget Plan"
                                                            data-bs-toggle="modal" data-bs-target=".show-plan-modal">
                                                            Details
                                                        </button>

                                                        <a href="" class="btn btn-sm btn-warning">Budget Plan</a>
                                                    </td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                                <tr>
                                                    <td class="align-middle border-bottom-0">2</td>
                                                    <td class="align-middle border-bottom-0">Product Launch</td>
                                                    <td class="align-middle border-bottom-0">Development</td>
                                                    <td class="align-middle border-bottom-0">Wednesday</td>
                                                    <td class="align-middle border-bottom-0">2024-10-04</td>
                                                    <td class="align-middle border-bottom-0">$1500</td>
                                                    <td class="align-middle border-bottom-0">
                                                        <button type="button" class="btn btn-success btn-sm" data-url="" data-title="Edit Budget Plan"
                                                            data-bs-toggle="modal" data-bs-target=".edit-plan-modal">
                                                            Edit
                                                        </button>

                                                        <a href="" class="btn btn-sm btn-danger" data-sweetalert-delete data-title="Delete!" data-text="Are you sure you want to delete?">
                                                            Hapus
                                                        </a>

                                                        <button type="button" class="btn btn-primary btn-sm" data-url="" data-title="Budget Plan"
                                                            data-bs-toggle="modal" data-bs-target=".show-plan-modal">
                                                            Details
                                                        </button>

                                                        <a href="" class="btn btn-sm btn-warning">Budget Plan</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
