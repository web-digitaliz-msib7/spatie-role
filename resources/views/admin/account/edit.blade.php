<x-app-layout>
    <div class=" pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Create Account Admin</div>
            <div>
                <a href="{{ route('admin.admin-accounts.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <form action="{{ route('admin.admin-accounts.update', $admin_account->id) }}" method="POST"
                            class="w-100">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Form Input User di Kiri -->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <x-alert.error-validation />
                                    <x-form.input id="name" label="User Name" name="name"
                                        placeholder="User Name" value="{{ old('name', $admin_account->name) }}" />
                                    <x-form.input id="email" label="Email" name="email"
                                        placeholder="Email Address here" type="email"
                                        value="{{ old('email', $admin_account->email) }}" />
                                    <x-form.input id="old-password" label="Old Password" name="old_password"
                                        type="password" placeholder="Old Password (if changing)" />
                                    <x-form.input id="password" label="New Password" name="password" type="password"
                                        placeholder="Leave blank if not changing" />
                                    <x-form.input id="password-confirm" label="Confirm Password"
                                        name="password_confirmation" type="password"
                                        placeholder="Confirm New Password" />
                                </div>

                                <!-- Hak Akses di Tengah -->
                                <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                                    <div class="mb-3">
                                        <div class="mb-3"><i class="fa-solid fa-user-shield me-2"></i>Hak Akses</div>
                                        <div class="table-responsive pt-3">
                                            <table class="table table-bordered text-dark mb-0">
                                                <thead class="table-secondary text-dark fw-bold">
                                                    <tr>
                                                        <th class="col">#</th>
                                                        <th class="col">Category</th>
                                                        <th class="col">Permission</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <th class="text-center">{{ $loop->iteration }}</th>
                                                            <td>{{ $category->name }}</td>
                                                            <td>
                                                                @if ($category->permissions->isNotEmpty())
                                                                    @foreach ($category->permissions as $permission)
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input permission-checkbox"
                                                                                name="permissions[]"
                                                                                value="{{ $permission->id }}"
                                                                                id="permission-{{ $permission->id }}"
                                                                                {{ in_array($permission->id, $userPermissions) ? 'checked' : '' }}>
                                                                            <label class="form-check-label"
                                                                                for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <span>No permissions assigned</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
