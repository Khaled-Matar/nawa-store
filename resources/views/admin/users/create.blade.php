@extends('layouts.admin')
@section('content')
    <h2 class="mb-4 fs-3">New User</h2>

    <form action="{{ route('register') }}" method="post">
        @csrf
        @include('admin.users._form', [
            'submit_label' => 'Create',
        ])
    </form>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

      
    </form> --}}
@endsection
