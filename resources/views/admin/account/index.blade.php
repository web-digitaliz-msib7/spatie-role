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
                            <h1 class="fw-semi-bold text-center">Dashboard Account</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="table-responsive pt-10">
            <div class="pb-5">    
                <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary"> Create akun</a>
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
                        {{-- jika menggunakan data di bawah ini masih aman aja --}}
                        {{-- <td>{{$user->roles[0]->name}}</td> --}} 
                        <td>{{ $user->roles->first()->name }}</td>
                        <td>
                            <a href="{{ route('admin.accounts.edit', $user->id) }}" class="btn btn-primary">edit</a>

                            <form action="{{ route('admin.accounts.destroy', $user->id) }}" method="post">
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