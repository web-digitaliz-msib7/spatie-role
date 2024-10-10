<x-app-layout>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 mx-auto col-12 mt-6">
                <div class="card rounded-2 mx-auto">
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
                <a href="{{ route('admin-accounts.create') }}" class="btn btn-primary">Create</a>
                <x-alert.error-validation />
            </div>
            <table class="table text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-success">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user->permissions as $permission)
                                    <span class="badge bg-info">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td class="d-flex justify-content-center" >
                                <a href="{{ route('admin-accounts.edit', $user->id) }}" class="btn btn-primary mx-2">
                                    Edit
                                </a>
                                <a href="{{ route('admin-accounts.destroy', $user->id) }}" class="btn btn-danger"
                                    data-sweetalert-delete data-title="Delete!"
                                    data-text="Are you sure you want to delete {{ $user->name }}?">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
