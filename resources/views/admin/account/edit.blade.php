<x-form.form action="{{ route('admin.accounts.update', $id->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Menambahkan metode PUT untuk update -->
    
    <x-form.input id="name" label="User Name" name="name" placeholder="User Name" value="{{ old('name', $id->name) }}" />

    <x-form.input id="email" label="Email" name="email" placeholder="Email Address here" type="email" value="{{ old('email', $id->email) }}" />

    <x-form.input id="old-password" label="Old Password" name="old_password" type="password" placeholder="Old Password (if changing)" />

    <x-form.input id="password" label="New Password" name="password" type="password" placeholder="Leave blank if not changing" />

    <x-form.input id="password-confirm" label="Confirm Password" name="password_confirmation" type="password" placeholder="Confirm New Password" />

    <div class="d-grid">
        <x-button.btn>Update Admin</x-button.btn>
    </div>
</x-form.form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
