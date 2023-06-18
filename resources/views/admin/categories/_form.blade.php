@if ($errors->any())
    <div class="alert alert-danger">
        You have some errors
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-floating mb-3">
    <label for="name">category Name</label>
    <div>
        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $product->name) }}" placeholder="Name">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-primary">save</button>
