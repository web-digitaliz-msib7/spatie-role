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
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Add Permision
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-12 mt-6">
                <!-- card -->
                <div class="card rounded-2 mx-auto">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <div class="text-dark fw-bold d-flex align-items-center">
                            <select class="form-select me-2" id="paginationDropdown" style="width: auto;">
                                @for ($i = 1; $i <= $permissions->lastPage(); $i++)
                                    <option value="{{ $i }}"
                                        {{ $i == $permissions->currentPage() ? 'selected' : '' }}>
                                        Page {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <!-- Pencarian -->
                        <form action="" method="GET">
                            <input type="text" class="form-control" name="search" placeholder="Search..."
                                value="{{ request('search') }}">
                            {{-- <button type="submit" class="btn btn-primary">Search</button> --}}
                        </form>

                    </div>

                    <div class="table-responsive pt-3">
                        <table class="table table-bordered text-dark mb-0">
                            <thead class="table-secondary text-dark fw-bold">
                                <tr>
                                    <th class="col">#</th>
                                    <th class="col">User Permission</th>
                                    <th class="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td>{{ $permission->name }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                class="btn btn-success mx-2"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <a href="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                class="btn btn-danger" data-sweetalert-delete data-title="Delete!"
                                                data-text="Are you sure you want to delete {{ $permission->name }}?"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('paginationDropdown').addEventListener('change', function() {
                var selectedPage = this.value;
                var url = new URL(window.location.href);
                url.searchParams.set('page', selectedPage);
                window.location.href = url.href;
            });
        </script>
    @endpush
</x-app-layout>
