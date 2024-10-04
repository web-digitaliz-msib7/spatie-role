<x-app-layout>
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <!-- card body -->
                    <div class="card-body">
                        <div>
                            <h1 class="fw-semi-bold text-center">Dashboard Permission Role Setup</h1>
                        </div>
                        <!-- Permission Table -->
                        <div class="mt-4">
                            <form action="{{ route('admin.permissions.role.update', $id->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <table class="min-w-full bg-white border border-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th>#</th>
                                            <th>Permission Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                                <td class="py-2 px-4 border-b text-center">{{ $loop->iteration }}</td>
                                                <td class="py-2 px-4 border-b">{{$permission->name}}</td>
                                                <td class="py-2 px-4 border-b text-center">
                                                    <input type="checkbox" name="name[]" value="{{ $permission->id }}" {{ $id->hasPermissionTo($permission->name) ? 'checked' : '' }} class="form-checkbox">
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4 text-center">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Permissions</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
