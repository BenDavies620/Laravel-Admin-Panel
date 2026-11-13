@if (session('success'))
    <div class="app-alert app-alert--success alert alert-dismissible fade show"
         role="status"
         aria-live="polite">

        <span class="app-alert__icon">
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <circle cx="12" cy="12" r="9"/>
                <path d="m8.5 12 2.3 2.3 4.7-5"/>
            </svg>
        </span>

        <span class="app-alert__message">
            {{ session('success') }}
        </span>

        <button type="button"
                class="btn-close app-alert__close"
                data-bs-dismiss="alert"
                aria-label="Dismiss notification">
        </button>
    </div>
@endif