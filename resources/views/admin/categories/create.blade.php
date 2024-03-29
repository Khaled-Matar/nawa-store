@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">New category</h2>

    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.categories._form', [
            'submit_label' => 'Create',
        ])
    </form>
@endsection
