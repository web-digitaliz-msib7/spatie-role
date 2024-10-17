<x-app-layout>
    <div class=" pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-dark text-capitalize fw-bold fs-1">Permission category (Hak Akses)</div>
            <div>
                <a href="#" class="btn btn-secondary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                    </svg>
                    Refresh
                </a>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Add Category
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Kategori di Kiri -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Kategori</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Input nama kategori">
                                    </div>
                                </div>

                                <!-- Permissions di Kanan -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" id="{{ $permission->name }}" name="permissions[]"
                                                    value="{{ $permission->id }}">
                                                <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Submit di Tengah -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
