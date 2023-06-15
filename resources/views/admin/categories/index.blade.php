@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">{{ $title }}</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary"> + Create Category</a>

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
                <th>Edit</th>
                <th>delete</th>            </tr>
        </thead>
        <tbody>
            <td>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }} </td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-outline-dark"><i class="far fa-edit"></i> Edit</a></td>
                        <td>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
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
