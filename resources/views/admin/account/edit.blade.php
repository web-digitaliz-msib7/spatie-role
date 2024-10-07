<x-form.form action="{{ route('admin.accounts.update', $id->id) }}">
    <x-form.input id="name" label="User Name" name="name" placeholder="User Name" value="{{ $id->name }}" />

    <x-form.input id="email" label="Email" name="email" placeholder="Email Adress here"
        value="{{ $id->email }}" />

    <x-form.input id="password" label="Old Password" name="password" placeholder="**************" />

    <x-form.input id="password" label="New Password" name="password" placeholder="**************" />

    <x-form.input id="confirm-password" label="Old Password" name="password" placeholder="**************" />

    <div class="d-grid">
        <x-button.btn>Update Admin</x-button.btn>
    </div>
</x-form.form>
