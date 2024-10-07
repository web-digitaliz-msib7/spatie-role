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
                            <h1 class="fw-semi-bold text-center">Dashboard Admin Account</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive pt-10">
            <div class="pb-5">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                    Create
                </button>
                <x-alert.error-validation />
            </div>
            <table class="table text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($users); --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->roles->first()->name }}</td> --}}
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-success">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary mx-2"
                                    data-url="{{ route('admin.accounts.edit', $user->id) }}" data-title="Edit Account"
                                    data-bs-toggle="modal" data-bs-target=".edit-modal">
                                    Edit
                                </button>

                                <a href="{{ route('admin.accounts.destroy', $user->id) }}" class="btn btn-danger"
                                    data-sweetalert-delete data-title="Delete!"
                                    data-text="Are you sure you want to delete {{ $user->name }}?">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <x-modal.modal title="Create Admin">
        <x-form.form action="{{ route('admin.accounts.store') }}">

            @include('admin.account._form')
            <div class="d-grid">
                <x-button.btn>Create Admin</x-button.btn>
            </div>
        </x-form.form>
    </x-modal.modal>

    <x-modal.show class="edit-modal" />
</x-app-layout>
