@extends('layouts.app')

@section('content')

<div class="employees-page">

    <header class="employees-page__header">
        <div>
            <h1 class="employees-page__title">Employees</h1>

            <p class="employees-page__description">
                Manage employee records and company assignments.
            </p>
        </div>

        <a href="{{ route('employees.create') }}"
           class="btn btn-primary">
            + Add Employee
        </a>
    </header>

    <section class="stats-grid">

        <!-- Total employees -->
        <div class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">Total Employees</h2>

                <p class="stats-card__count">
                    {{ $totalEmployees }}
                </p>

                <p class="stats-card__description">
                    Registered employees
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </div>

        <!-- Assigned employees -->
        <div class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">Assigned to Companies</h2>

                <p class="stats-card__count">
                    {{ $employeesAssigned }}
                </p>

                <p class="stats-card__description">
                    Employees with a company assignment
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                    <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                    <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                    <path d="M10 6h4M10 10h4M10 14h4M10 18h4"/>
                </svg>
            </div>
        </div>
    </section>

    <section class="employees-directory">

        <div class="employees-directory__header">
            <div>
                <h2 class="employees-directory__title">Employee directory</h2>
                <p class="employees-directory__description">
                    View and manage your registered employees.
                </p>
            </div>
        </div>

        <div class="employees-directory__table-wrapper">

            <div class="table-responsive">
                <table class="table employees-directory__table">

                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>

                                <!-- Employee details -->
                                <td>
                                    <div class="employees-directory__employee">

                                        <div class="employees-directory__avatar">
                                            {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                        </div>

                                        <div class="employees-directory__employee-details">
                                            <span class="employees-directory__employee-name">
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </span>

                                            <span class="employees-directory__employee-id">
                                                Employee #{{ $employee->id }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Company -->
                                <td>
                                    @if ($employee->company)
                                        <span class="employees-directory__company-name">
                                            {{ $employee->company->name }}
                                        </span>
                                    @else
                                        <span class="employees-directory__empty">
                                            No company assigned
                                        </span>
                                    @endif
                                </td>

                                <!-- Email -->
                                <td>
                                    @if ($employee->email)
                                        <a href="mailto:{{ $employee->email }}"
                                        class="employees-directory__link">
                                            {{ $employee->email }}
                                        </a>
                                    @else
                                        <span class="employees-directory__empty">
                                            Not provided
                                        </span>
                                    @endif
                                </td>

                                <!-- Phone -->
                                <td>
                                    @if ($employee->phone_number)
                                        <a href="tel:{{ preg_replace('/\s+/', '', $employee->phone_number) }}"
                                        class="employees-directory__link">
                                            {{ $employee->phone_number }}
                                        </a>
                                    @else
                                        <span class="employees-directory__empty">
                                            Not provided
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="employees-directory__actions">

                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form method="POST"
                                            action="{{ route('employees.destroy', $employee->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this employee?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="employees-directory__empty-state">
                                    No employees have been added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="employees-directory__pagination">
                {{ $employees->links() }}
            </div>
        </div>
    </section>
</div>

@endsection