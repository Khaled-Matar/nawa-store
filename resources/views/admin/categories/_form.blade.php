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
    <x-form.input label="Category Name" id="name" name="name" value="{{ $category->name }}"/> 

</div>
<button type="submit" class="btn btn-primary">save</button>
