<x-app-layout>
    <x-form.formCard>
        <x-alert.error-validation />
        <x-form.form action="{{ route('admin.permissions.update', $permission->id) }}">
            @method('PUT')
            @include('admin.permission._form')

            <div class="modal-footer">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Cancel</a>
                <x-button.btn class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i>Update</x-button.btn>
            </div>
        </x-form.form>
    </x-form.formCard>
</x-app-layout>
