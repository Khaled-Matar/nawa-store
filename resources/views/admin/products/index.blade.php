@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">{{ $title }}</h2>
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"> + Create Product</a>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Compare Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }} </td>
                        <td>{{ $product->name }} </td>
                        <td>{{ $product->category_name }} </td>
                        <td>{{ $product->price }} </td>
                        <td>{{ $product->compare_price }} </td>
                        <td>{{ $product->status }} </td>
                        <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-outline-dark"><i class="far fa-edit"></i> Edit</a></td>
                        <td>
                            <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </td>
        </tbody>
    </table>
@endsection
