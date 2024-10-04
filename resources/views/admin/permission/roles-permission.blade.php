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
                            <h1 class="fw-semi-bold text-center">Dashboard permission Role</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="table-responsive pt-10">
            <table class="table text-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>role</th>
                        <th>permission</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-success">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.permissions.role.edit', $role->id) }}" class="btn btn-primary">Edit</a>

                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">delet</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
