@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Companies</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}

    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>

</div>

@endsection