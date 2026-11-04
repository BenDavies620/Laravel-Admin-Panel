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
                <th>Logo</th>
                <th>Email</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>
                        @if($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} logo" width="60" height="60" style="object-fit:contain;">
                        @endif
                    </td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('companies.destroy', $company->id) }}" onsubmit="return confirm('Are you sure you want to delete this company?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}

    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>

</div>

@endsection