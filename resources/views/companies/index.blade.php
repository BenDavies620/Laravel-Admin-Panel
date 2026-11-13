@extends('layouts.app')

@section('content')

<div class="companies-page">

    <!-- Page heading -->
    <header class="companies-page__header">
        <div>
            <h1 class="companies-page__title">Companies</h1>

            <p class="companies-page__description">
                Manage your company records and information.
            </p>
        </div>

        <a href="{{ route('companies.create') }}"
           class="btn btn-primary companies-page__add-button">
            + Add Company
        </a>
    </header>

    <!-- Company statistics -->
    <section class="stats-grid">

        <!-- Total companies -->
        <div class="stats-card">

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
        </div>

        <!-- Companies with logos -->
        <div class="stats-card">

            <div class="stats-card__content">
                <h2 class="stats-card__label">With Logos</h2>

                <p class="stats-card__count">
                    {{ $companiesWithLogos }}
                </p>

                <p class="stats-card__description">
                    Companies with branding
                </p>
            </div>

            <div class="stats-card__icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.8"
                     stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <path d="m21 15-5-5L5 21"/>
                    <path d="m14 21 4-4"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Company directory -->
    <section class="companies-directory">

        <div class="companies-directory__header">
            <div>
                <h2 class="companies-directory__title">Company directory</h2>
                <p class="companies-directory__description">
                    View and manage your registered companies.
                </p>
            </div>
        </div>

        <div class="companies-directory__table-wrapper">

            <div class="table-responsive">
                <table class="table companies-directory__table">

                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($companies as $company)
                            <tr>

                                <!-- Company details -->
                                <td>
                                    <div class="companies-directory__company">

                                        @if ($company->logo)
                                            <img
                                                src="{{ route('company-logos.show', basename($company->logo)) }}"
                                                alt="{{ $company->name }} logo"
                                                class="companies-directory__logo"
                                            >
                                        @else
                                            <div class="companies-directory__logo-placeholder">
                                                {{ strtoupper(substr($company->name, 0, 1)) }}
                                            </div>
                                        @endif

                                        <div class="companies-directory__company-details">
                                            <span class="companies-directory__company-name">
                                                {{ $company->name }}
                                            </span>

                                            <span class="companies-directory__company-id">
                                                Company #{{ $company->id }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Email -->
                                <td>
                                    @if ($company->email)
                                        <a href="mailto:{{ $company->email }}"
                                           class="companies-directory__link">
                                            {{ $company->email }}
                                        </a>
                                    @else
                                        <span class="companies-directory__empty">
                                            Not provided
                                        </span>
                                    @endif
                                </td>

                                <!-- Website -->
                                <td>
                                    @if ($company->website)
                                        <a href="{{ $company->website }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="companies-directory__link">
                                            {{ $company->website }}
                                        </a>
                                    @else
                                        <span class="companies-directory__empty">
                                            Not provided
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="companies-directory__actions">

                                        <a href="{{ route('companies.edit', $company->id) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form method="POST"
                                              action="{{ route('companies.destroy', $company->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this company?');">

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
                                <td colspan="4" class="companies-directory__empty-state">
                                    No companies have been added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="companies-directory__pagination">
                {{ $companies->links() }}
            </div>
        </div>
    </section>
</div>

@endsection