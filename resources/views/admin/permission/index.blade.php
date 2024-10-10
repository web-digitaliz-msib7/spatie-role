<x-app-layout>
    <div class=" pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <h1 class="fw-semi-bold text-center">Dashboard permission</h1>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive pt-10">
                <div class="pb-5">
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create</a>
                </div>
                <table class="table text-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                        class="btn btn-primary mx-2">Edit</a>

                                    <a href="{{ route('permissions.destroy', $permission->id) }}"
                                        class="btn btn-danger" data-sweetalert-delete data-title="Delete!"
                                        data-text="Are you sure you want to delete {{ $permission->name }}?">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
