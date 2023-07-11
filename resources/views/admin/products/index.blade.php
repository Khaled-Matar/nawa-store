@extends('layouts.admin')
@section('content')
    <header class="mb-4 d-flex">
        <h2 class="mb-4 fs-3">{{ $title }}</h2>
        <div class="ml-auto">
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"> + Create Product</a>
            <a href="{{ route('products.trashed') }}" class="btn btn-sm btn-danger"> <i class="fas fa-trash"> View
                    Trash</i></a>
        </div>
    </header>
    @if (session()->has('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <script>
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>

    <form action="{{ URL::current() }}" method="get" class="form-inline">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control mb-2 mr-2"
            placeholder="Search">
        <select name="category_id" class="form-control mb-2 mr-2">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>

        <select name="Status" class="form-control mb-2 mr-2">
            <option value="">Status</option>
            @foreach ($status_options as $value => $text)
                <option value="{{ $value }}" @selected(request('status') == $value)>{{ $text }}</option>
            @endforeach
        </select>
        <input type="number" name="price_min" value="{{ request('price_min') }}" class="form-control mb-2 mr-2"
            placeholder="price_min">
        <input type="number" name="price_max" value="{{ request('price_max') }}" class="form-control mb-2 mr-2"
            placeholder="price_max">
        <button type="submit" class="btn btn-dark">Filter</button>

    </form>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Compare Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <a href="{{ $product->image_url }}">
                                <img src="{{ $product->image_url }}" width="60" alt="">
                            </a>
                        </td>
                        <td>{{ $product->id }} </td>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->category_name }} </td>
                        <td>{{ $product->price_formatted }} </td>
                        <td>{{ $product->compare_price_formatted }} </td>
                        <td>{{ $product->status }} </td>
                        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class="far fa-edit"></i>Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </td>
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
