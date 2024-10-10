<x-app-layout>
    <x-form.formCard>
        <x-alert.error-validation />
        <x-form.form action="{{ route('admin-accounts.store') }}">
            @include('admin.account._form')

            <h5 class="mt-3">Assign Permissions</h5>
            <div>
                @foreach ($permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                        <label>{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="d-grid">
                <x-button.btn>Create Admin</x-button.btn>
            </div>
        </x-form.form>
    </x-form.formCard>
</x-app-layout>
