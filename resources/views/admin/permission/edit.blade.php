<form action="{{ route("admin.permission.update", $id->id) }}"  method="post">
    @csrf
    @method('PUT')
    @include('admin.form.form')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>