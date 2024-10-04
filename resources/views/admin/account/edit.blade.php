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
                            <h1 class="fw-semi-bold text-center">Create Account</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12 mx-auto col-12 mt-6">
            <form action="{{ route('admin.accounts.store', $id->id) }}" method="POST">
                @csrf
                <!-- Username -->
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{$id->name}}" placeholder="User Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Email address here" value="{{$id->email}}" required
                        autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Old Password</label>
                    <input type="password" id="password" class="form-control"
                        name="current_password" placeholder="**************">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" class="form-control"
                        name="password" placeholder="**************">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm
                        Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="**************">
                </div>
                <div>
                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Update Admin
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>