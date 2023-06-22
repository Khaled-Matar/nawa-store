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

<div class="row">
    <div class="col-md-8">
        <x-form.input label="Product Name" id="name" name="name" value="{{ $product->name }}" /> 
        <x-form.input label="URL Slug" id="slug" name="slug" value="{{ $product->slug }}" /> 
        <x-form.textarea label="Description" id="description" name="description" value="{{ $product->description }}"    />
        <x-form.textarea label="Short description" id="short_description" name="short_description"
            value="{{ $product->short_description }}"/>

        <div class="mb-3">
            <label for="gallery">Product Gallery</label>
            <div>
                <input type="file" class="form-control @error('gallery') is-invalid @enderror" id="gallery"
                    name="gallery[]" multiple placeholder="Product Gallery">
            </div>
            @if ($gallery ?? false)
                <div class="row">
                    @foreach ($gallery as $image)
                        <div class="col-md-3">
                            <img src="{{ $image->url }}" calss="img-fluid" alt="">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        {{-- <x-form.select_status id="status" name="status" label="Status" :value="$product->status" :options="$status->pluck('name', 'id')"/> --}}
        <x-form.select name="category_id" id="category_id" label="Category" :value="$product->category_id" :options="$categories->pluck('name', 'id')" /></div>
        <x-form.input_number label="Product Price" id="price" name="price" value="{{ $product->price }}" />
        <x-form.input_number label="Product Compare Price" id="compare_price" name="compare_price"
            value="{{ $product->compare_price }}" />
        <div class="form-floating mb-3">
            <label for="image">Product Image</label>
            <div>
                <img src="{{ $product->image_url }}" width="100" alt="">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" placeholder="Product Image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $submit_label ?? 'Save' }}</button>
