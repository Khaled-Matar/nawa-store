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
    <x-form.input label="Category Name" id="name" name="name" value="{{ $category->name }}" />
    <x-form.image label="Category Image" id="image" name="image"
        value="{{ $category->image_url }}" />
        {{-- <div class="form-floating mb-3">
            <label for="image">Category Image</label>
            <div>
                <img src="{{ $category->image_url }}" width="100" alt="">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" placeholder="Category Image">
                <x-form.error name="image" />
            </div>
        </div> --}}
</div>
<button type="submit" class="btn btn-primary">save</button>
