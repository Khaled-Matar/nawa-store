    <div class="form-floating mb-3">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
            placeholder="Name">
    </div>
    <div class="form-floating mb-3">
        <label for="slug">URL Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}"
            placeholder="Slug">
    </div>
    <div class="form-floating mb-3">
        <label for="category_id">category</label>
        <select type="text" class="form-control" id="category_id" name="category_id" placeholder="category_id">
            <option></option>
            @foreach ($categries as $category)
                <option @selected($category->id == $product->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-floating mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" placeholder="description">{{ $product->description }}</textarea>
    </div>
    <div class="form-floating mb-3">
        <label for="short_description">Short description</label>
        <textarea type="text" class="form-control" id="short_description" name="short_description"
            placeholder="short_description">{{ $product->short_description }} </textarea>
    </div>

    <div class="form-floating mb-3">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}"
            placeholder="price">
    </div>
    <div class="form-floating mb-3">
        <label for="compare_price">Compare Price</label>
        <input type="number" class="form-control" id="compare_price" name="compare_price"
            value="{{ $product->compare_price }}" placeholder="compare_price">
    </div>
    <div class="form-floating mb-3">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
    </div>
    <button type="submit" class="btn btn-primary">{{$submit_label ?? 'Save'}}</button>
