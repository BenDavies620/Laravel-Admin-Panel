@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Edit Company</h1>

        <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label for="name">Company Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}">

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="email">Company Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email) }}">

            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="website">Company Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}">

            @error('website')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="logo">Company Logo</label>
            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">

            @if($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} logo">
            @endif

            <button type="submit" class="btn btn-primary">Update Company</button>
            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection