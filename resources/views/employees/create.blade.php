@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>Create Employee</h1>

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <label for="first_name">Employee First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}">

            @error('first_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="last_name">Employee Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">

            @error('last_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="company_id">Company</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="">No company assigned</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @selected(old('company_id') == $company->id)>{{ $company->name }}</option>
                @endforeach
            </select>

            @error('company_id')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="email">Employee Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <label for="phone_number">Employee Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">

            @error('phone_number')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Create Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection