<x-form.form action="{{ route('admin.permission.update', $id->id) }}">
    @method('PUT')
    @include('admin.permission._form')

    <div class="modal-footer">
        <x-button.btn class="btn btn-secondary" data-bs-dismiss="modal">Close</x-button.btn>
        <x-button.btn class="btn btn-primary">Save changes</x-button.btn>
    </div>
</x-form.form>
