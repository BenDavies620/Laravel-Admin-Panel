@extends('layouts.app')

@section('content')

<div class="employee-form-page">

    <!-- Page heading -->
    <header class="employee-form-page__header">
        <div>
            <h1 class="employee-form-page__title">
                Edit Employee
            </h1>

            <p class="employee-form-page__description">
                Update employee details and company assignment.
            </p>
        </div>

        <a href="{{ route('employees.index') }}"
           class="btn btn-outline-secondary">
            Back to employees
        </a>
    </header>

    <!-- Form card -->
    <div class="employee-form__card">

        <form method="POST"
              action="{{ route('employees.update', $employee->id) }}">

            @csrf
            @method('PATCH')

            <!-- Employee details -->
            <div class="employee-form__section">

                <h2 class="employee-form__section-title">
                    Employee details
                </h2>

                <div class="employee-form__grid">

                    <div class="employee-form__field">
                        <label for="first_name" class="form-label">
                            First Name
                        </label>

                        <input type="text"
                               name="first_name"
                               id="first_name"
                               class="form-control"
                               value="{{ old('first_name', $employee->first_name) }}"
                               required>

                        @error('first_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="employee-form__field">
                        <label for="last_name" class="form-label">
                            Last Name
                        </label>

                        <input type="text"
                               name="last_name"
                               id="last_name"
                               class="form-control"
                               value="{{ old('last_name', $employee->last_name) }}"
                               required>

                        @error('last_name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="employee-form__field">
                        <label for="email" class="form-label">
                            Email Address
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               value="{{ old('email', $employee->email) }}">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="employee-form__field">
                        <label for="phone_number" class="form-label">
                            Phone Number
                        </label>

                        <input type="tel"
                               name="phone_number"
                               id="phone_number"
                               class="form-control"
                               value="{{ old('phone_number', $employee->phone_number) }}">

                        @error('phone_number')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Company assignment -->
            <div class="employee-form__section">

                <h2 class="employee-form__section-title">
                    Company assignment
                </h2>

                <div class="employee-form__grid">

                    <div class="employee-form__field employee-form__field--full">

                        <label for="company_id" class="form-label">
                            Assigned Company
                        </label>

                        <select name="company_id"
                                id="company_id"
                                class="form-select">

                            <option value=""
                                @selected(old('company_id', $employee->company_id) == null)>
                                No company assigned
                            </option>

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                    @selected(old('company_id', $employee->company_id) == $company->id)>
                                    {{ $company->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('company_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-text">
                            Company assignment is optional.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form actions -->
            <div class="employee-form__actions">

                <a href="{{ route('employees.index') }}"
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