@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">{{ $title }}</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"> + Create Product</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }}</td>
                        <td><a href="" class="btn btn-sm btn-outline-dark"><i class="far fa-edit"></i> Edit</a></td>
                    </tr>
                @endforeach
            </td>
        </tbody>
    </table>
@endsection
