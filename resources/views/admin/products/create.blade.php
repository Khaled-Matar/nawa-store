@extends('layouts.admin')
@section('content')
        <h2 class="mb-4 fs-3">{{' New Product '}}</h2>
       
        <form action="{{route('products.store')}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                <label for="name">Product Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                <label for="slug">URL Slug</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description" placeholder="description"></textarea>
                <label for="description">Description</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="short_description" name="short_description" placeholder="short_description"></textarea>
                <label for="short_description">Short description</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="price" name="price" placeholder="price">
                <label for="price">Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="compare_price" name="compare_price" placeholder="compare_price">
                <label for="compare_price">Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="image" name="image" placeholder="Product Image">
                <label for="image">Image</label>
            </div>
            <button type="submit" class="btn btn-primary">save</button>

        </form>

@endsection