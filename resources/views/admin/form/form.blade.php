<div class="mb-3">
    <label for="name" class="form-label">Permission Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name', @$id->name)}}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>