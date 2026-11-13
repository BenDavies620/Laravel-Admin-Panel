@extends('layouts.app')

@section('content')

<div class="dashboard-page">

    <!-- Dashboard heading -->
    <header class="dashboard-page__header">
        <div>
            <h1 class="dashboard-page__title">Dashboard</h1>

            <p class="dashboard-page__description">
                Welcome back. Here's an overview of your organisation.
            </p>
        </div>
    </header>

    <!-- Dashboard statistics -->
    <section class="stats-grid stats-grid--dashboard">

        <!-- Total companies -->
        <a href="{{ route('companies.index') }}" class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">Total Companies</h2>

                <p class="stats-card__count">
                    {{ $totalCompanies }}
                </p>

                <p class="stats-card__description">
                    Registered companies
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                    <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                    <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                    <path d="M10 6h4M10 10h4M10 14h4M10 18h4"/>
                </svg>
            </div>
        </a>

        <!-- Total employees -->
        <a href="{{ route('employees.index') }}" class="stats-card">

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
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </a>

        <!-- Assigned employees -->
        <div class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">Assigned Employees</h2>

                <p class="stats-card__count">
                    {{ $employeesAssigned }}
                </p>

                <p class="stats-card__description">
                    Linked to a company
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <circle cx="9" cy="8" r="3"/>
                    <path d="M3.5 20a5.5 5.5 0 0 1 11 0"/>
                    <path d="m16 11 2 2 4-4"/>
                </svg>
            </div>
        </div>

        <!-- Unassigned employees -->
        <div class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">Unassigned Employees</h2>

                <p class="stats-card__count">
                    {{ $employeesUnassigned }}
                </p>

                <p class="stats-card__description">
                    Without a company
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <circle cx="9" cy="8" r="3"/>
                    <path d="M3.5 20a5.5 5.5 0 0 1 11 0"/>
                    <path d="m17 10 4 4M21 10l-4 4"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Quick actions -->
    <section class="dashboard-actions">

        <div class="dashboard-actions__header">
            <h2 class="dashboard-actions__title">Quick actions</h2>
            <p class="dashboard-actions__description">Common tasks and shortcuts.</p>
        </div>

        <div class="dashboard-actions__grid">

            <!-- Add company -->
            <a href="{{ route('companies.create') }}"
            class="dashboard-action">

                <div class="dashboard-action__icon">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round"
                         aria-hidden="true">
                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                        <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                        <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                        <path d="M10 6h4M10 10h4M10 14h4M10 18h4"/>
                    </svg>
                </div>

                <div class="dashboard-action__content">
                    <h3>Add a company</h3>
                </div>

                <span class="dashboard-action__arrow">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M7 17 17 7M7 7h10v10"/>
                    </svg>
                </span>

            </a>

            <!-- Add employee -->
            <a href="{{ route('employees.create') }}"
            class="dashboard-action">

                <div class="dashboard-action__icon">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <circle cx="9" cy="8" r="3"/>
                        <path d="M3 21v-1a6 6 0 0 1 12 0v1"/>
                        <path d="M19 8v6M16 11h6"/>
                    </svg>
                </div>

                <div class="dashboard-action__content">
                    <h3>Add an employee</h3>
                </div>

                <span class="dashboard-action__arrow">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M7 17 17 7M7 7h10v10"/>
                    </svg>
                </span>
            </a>
        </div>
    </section>
    
    <!-- Recently added records -->
    <section class="dashboard-recent">

        <div class="dashboard-recent__header">
            <h2 class="dashboard-recent__title">Recently added</h2>

            <p class="dashboard-recent__description">
                The latest companies and employees added to your records.
            </p>
        </div>

        <div class="dashboard-recent__grid">

            <!-- Recent companies -->
            <div class="dashboard-recent__card">

                <div class="dashboard-recent__card-header">
                    <h3 class="dashboard-recent__card-title">
                        Recent Companies
                    </h3>

                    <a href="{{ route('companies.index') }}"
                    class="dashboard-recent__view-all">
                        View all
                    </a>
                </div>

                <div class="dashboard-recent__list">

                    @forelse ($recentCompanies as $company)

                        <a href="{{ route('companies.edit', $company->id) }}"
                        class="dashboard-recent__item">

                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}"
                                    alt=""
                                    class="dashboard-recent__company-logo">
                            @else
                                <div class="dashboard-recent__company-placeholder">
                                    {{ strtoupper(substr($company->name, 0, 1)) }}
                                </div>
                            @endif

                            <div class="dashboard-recent__details">
                                <span class="dashboard-recent__name">
                                    {{ $company->name }}
                                </span>

                                <span class="dashboard-recent__meta">
                                    Added {{ $company->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </a>
                    @empty

                        <p class="dashboard-recent__empty">
                            No companies have been added yet.
                        </p>

                    @endforelse
                </div>
            </div>

            <!-- Recent employees -->
            <div class="dashboard-recent__card">

                <div class="dashboard-recent__card-header">
                    <h3 class="dashboard-recent__card-title">
                        Recent Employees
                    </h3>

                    <a href="{{ route('employees.index') }}"
                    class="dashboard-recent__view-all">
                        View all
                    </a>
                </div>

                <div class="dashboard-recent__list">

                    @forelse ($recentEmployees as $employee)

                        <a href="{{ route('employees.edit', $employee->id) }}"
                        class="dashboard-recent__item">

                            <div class="dashboard-recent__employee-avatar">
                                {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                            </div>

                            <div class="dashboard-recent__details">
                                <span class="dashboard-recent__name">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </span>

                                <span class="dashboard-recent__meta">
                                    {{ $employee->company?->name ?? 'No company assigned' }}
                                </span>
                            </div>

                            <span class="dashboard-recent__date">
                                {{ $employee->created_at->diffForHumans() }}
                            </span>
                        </a>
                    @empty

                        <p class="dashboard-recent__empty">
                            No employees have been added yet.
                        </p>

                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>

@endsection