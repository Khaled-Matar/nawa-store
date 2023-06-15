@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">New category</h2>

    <form action="{{ route('categories.update', $category->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name }}" placeholder="Name">
            <label for="name">category Name</label>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
@endsection