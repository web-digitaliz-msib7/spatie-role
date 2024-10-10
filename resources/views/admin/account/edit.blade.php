<x-app-layout>
    <x-form.formCard>
        <x-alert.error-validation />
        <x-form.form action="{{ route('admin-accounts.update', $admin_account->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-form.input id="name" label="User Name" name="name" placeholder="User Name"
                value="{{ old('name', $admin_account->name) }}" />
            <x-form.input id="email" label="Email" name="email" placeholder="Email Address here" type="email"
                value="{{ old('email', $admin_account->email) }}" />
            <x-form.input id="old-password" label="Old Password" name="old_password" type="password"
                placeholder="Old Password (if changing)" />
            <x-form.input id="password" label="New Password" name="password" type="password"
                placeholder="Leave blank if not changing" />
            <x-form.input id="password-confirm" label="Confirm Password" name="password_confirmation" type="password"
                placeholder="Confirm New Password" />

            <h5 class="mt-3">Assign Permissions</h5>
            <div>
                @foreach ($permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="{{ $permission->name }}"
                            {{ in_array($permission->id, $userPermissions) ? 'checked' : '' }}>
                        <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="d-grid">
                <x-button.btn class="btn-danger">cancle</x-button.btn>
                <x-button.btn>Update Admin</x-button.btn>
            </div>
        </x-form.form>
    </x-form.formCard>
</x-app-layout>
