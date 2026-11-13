@extends('layouts.app')

@section('content')

<div class="company-form-page">

    <!-- Page heading -->
    <header class="company-form-page__header">
        <div>
            <h1 class="company-form-page__title">Edit Company</h1>
            <p class="company-form-page__description">
                Update company details and branding.
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
              action="{{ route('companies.update', $company->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PATCH')

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
                               value="{{ old('name', $company->name) }}"
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
                               value="{{ old('email', $company->email) }}">

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
                               value="{{ old('website', $company->website) }}">

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

                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}"
                                 alt="{{ $company->name }} logo">
                        @else
                            <span>No logo</span>
                        @endif

                    </div>

                    <div class="company-form__logo-controls">

                        @if ($company->logo)
                            <p class="company-form__logo-current">
                                Current company logo
                            </p>
                        @else
                            <p class="company-form__logo-current">
                                This company has no logo yet.
                            </p>
                        @endif

                        <label for="logo" class="form-label">
                            Upload a new logo
                        </label>

                        <input type="file"
                               name="logo"
                               id="logo"
                               class="form-control"
                               accept="image/*">

                        <div class="form-text">
                            Minimum dimensions: 100 x 100 pixels.
                        </div>

                        @error('logo')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        @if ($company->logo)
                            <div class="company-form__remove-logo">

                                <input type="checkbox"
                                       name="remove_logo"
                                       id="remove_logo"
                                       value="1"
                                       class="form-check-input"
                                       @checked(old('remove_logo'))>

                                <label for="remove_logo"
                                       class="form-check-label">
                                    Remove current logo
                                </label>
                            </div>
                        @endif
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
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection