<form action="{{ route('admin.permission.store') }}" method="post">
    @csrf
    @include('admin.form.form')
    <button type="submit" class="btn btn-primary">Submit</button>
</form>