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
                        <x-form.form action="{{ route('admin.admin-accounts.store') }}" class="w-100">
                            <div class="row">
                                <!-- Form Input User di Kiri -->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <x-alert.error-validation />
                                    @include('admin.account._form')
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
                                                        <th class="col">
                                                            Permission
                                                        </th>

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
                                                                                id="permission_{{ $permission->id }}">
                                                                            <label class="form-check-label"
                                                                                for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
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
                                        @push('scripts')
                                            <script>
                                                document.getElementById('select_all').addEventListener('change', function() {
                                                    const checkboxes = document.querySelectorAll('.permission-checkbox');
                                                    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                                });
                                            </script>
                                        @endpush

                                    </div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
                                </div>
                            </div>
                        </x-form.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
