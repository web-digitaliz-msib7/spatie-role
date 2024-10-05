<x-app-layout>
    <div class="bg-primary pt-10 pb-21"></div>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        Create
                    </button>
                    {{-- <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Create</a> --}}
                </div>
                <x-alert.error-validation />
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
                                    <button type="button" class="btn btn-primary mx-2"
                                        data-url="{{ route('admin.permission.edit', $permission->id) }}"
                                        data-title="Edit Permission" data-bs-toggle="modal"
                                        data-bs-target=".edit-modal">
                                        Edit
                                    </button>

                                    <a href="{{ route('admin.permission.destroy', $permission->id) }}"
                                        class="btn btn-sm btn-danger" data-sweetalert-delete
                                        data-title="Delete!"
                                        data-text="Are you sure you want to delete {{ $permission->name }}?">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal.modal>
        <x-form.form action="{{ route('admin.permission.store') }}">
            @include('admin.permission._form')
            <div class="modal-footer">
                <x-button.btn class="btn btn-secondary" data-bs-dismiss="modal">Close</x-button.btn>
                <x-button.btn class="btn btn-primary">Save changes</x-button.btn>
            </div>
        </x-form.form>
    </x-modal.modal>

    <x-modal.show class="edit-modal" />

</x-app-layout>
