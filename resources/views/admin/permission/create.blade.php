<x-app-layout>
    <x-form.formCard>
        <x-alert.error-validation />
        <x-form.form action="{{ route('permissions.store') }}">
            @include('admin.permission._form')
            <div class="modal-footer">
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                <x-button.btn type="submit" class="btn btn-primary">Save</x-button.btn>
            </div>
        </x-form.form>
    </x-form.formCard>
</x-app-layout>
