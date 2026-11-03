@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Create Company</h1>

        <form method="POST" action="{{ route('companies.store') }}">
            @csrf
            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="email">Company Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="website">Company Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ old('website') }}">

            @error('website')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>
    </div>

@endsection