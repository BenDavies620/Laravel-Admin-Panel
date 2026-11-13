@extends('layouts.app')

@section('content')

<div class="company-form-page">

    <!-- Page heading -->
    <header class="company-form-page__header">
        <div>
            <h1 class="company-form-page__title">Create Company</h1>
            <p class="company-form-page__description">
                Add a new company to your records.
            </p>
        </div>

        <a href="{{ route('companies.index') }}"
           class="btn btn-outline-secondary">
            Back to companies
        </a>
    </header>

    <!-- Form card -->
    <div class="company-form__card">

        <form method="POST"
              action="{{ route('companies.store') }}"
              enctype="multipart/form-data">

            @csrf

            <!-- Company details -->
            <div class="company-form__section">

                <h2 class="company-form__section-title">
                    Company details
                </h2>

                <div class="company-form__grid">

                    <div class="company-form__field">
                        <label for="name" class="form-label">
                            Company Name
                        </label>

                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               required>

                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="company-form__field">
                        <label for="email" class="form-label">
                            Company Email
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               value="{{ old('email') }}">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="company-form__field">
                        <label for="website" class="form-label">
                            Company Website
                        </label>

                        <input type="url"
                               name="website"
                               id="website"
                               class="form-control"
                               value="{{ old('website') }}">

                        @error('website')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Company logo -->
            <div class="company-form__section">

                <h2 class="company-form__section-title">
                    Company logo
                </h2>

                <div class="company-form__logo-section">

                    <div class="company-form__logo-preview">
                        <span>Logo preview</span>
                    </div>

                    <div class="company-form__logo-controls">

                        <label for="logo" class="form-label">
                            Upload company logo
                        </label>

                        <input type="file"
                               name="logo"
                               id="logo"
                               class="form-control"
                               accept="image/*">

                        <div class="form-text">
                            Optional. Minimum dimensions: 100 × 100 pixels.
                        </div>

                        @error('logo')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form actions -->
            <div class="company-form__actions">

                <a href="{{ route('companies.index') }}"
                   class="btn btn-outline-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</div>

@endsection