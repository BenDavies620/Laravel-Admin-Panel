<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    @auth
        <div class="admin-layout">

            <!-- Sidebar -->
            <aside class="offcanvas offcanvas-start admin-sidebar"
                   tabindex="-1"
                   id="adminSidebar"
                   aria-labelledby="adminSidebarLabel">

                <!-- Mobile sidebar header -->
                <div class="offcanvas-header admin-sidebar__mobile-header d-lg-none">
                    <a href="{{ route('home') }}" class="admin-brand">
                        <span class="admin-brand__mark">A</span>
                        <span class="admin-brand__text">
                            <strong id="adminSidebarLabel">Admin Panel</strong>
                            <small>Management workspace</small>
                        </span>
                    </a>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close navigation">
                    </button>
                </div>

                <div class="offcanvas-body admin-sidebar__body">

                    <!-- Desktop branding -->
                    <a href="{{ route('home') }}"
                       class="admin-brand admin-sidebar__brand d-none d-lg-flex">
                        <span class="admin-brand__mark">A</span>
                        <span class="admin-brand__text">
                            <strong>Admin Panel</strong>
                            <small>Management workspace</small>
                        </span>
                    </a>

                    <div class="admin-sidebar__section-label">
                        MANAGEMENT
                    </div>

                    <nav class="admin-sidebar__nav" aria-label="Main navigation">

                        <a href="{{ route('home') }}"
                           class="admin-nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">

                            <span class="admin-nav-link__icon">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="9" rx="1"/>
                                    <rect x="14" y="3" width="7" height="5" rx="1"/>
                                    <rect x="14" y="12" width="7" height="9" rx="1"/>
                                    <rect x="3" y="16" width="7" height="5" rx="1"/>
                                </svg>
                            </span>

                            <span>Dashboard</span>
                        </a>

                        <a href="{{ route('companies.index') }}"
                           class="admin-nav-link {{ request()->routeIs('companies.*') ? 'is-active' : '' }}">

                            <span class="admin-nav-link__icon">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                                    <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                                    <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                                    <path d="M10 6h4M10 10h4M10 14h4M10 18h4"/>
                                </svg>
                            </span>

                            <span>Companies</span>
                        </a>

                        <a href="{{ route('employees.index') }}"
                           class="admin-nav-link {{ request()->routeIs('employees.*') ? 'is-active' : '' }}">

                            <span class="admin-nav-link__icon">
                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="8" r="3"/>
                                    <path d="M3.5 20a5.5 5.5 0 0 1 11 0"/>
                                    <path d="M16 5.5a3 3 0 0 1 0 5.8M17 14a5 5 0 0 1 3.5 4.8"/>
                                </svg>
                            </span>

                            <span>Employees</span>
                        </a>
                    </nav>

                    <div class="admin-sidebar__footer">
                        <span class="admin-sidebar__status-dot"></span>
                        <div>
                            <strong>Admin workspace</strong>
                            <small>System management</small>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main application area -->
            <div class="admin-main">

                <!-- Top bar -->
                <header class="admin-topbar">

                    <div class="admin-topbar__left">

                        <button type="button"
                                class="admin-menu-toggle d-lg-none"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#adminSidebar"
                                aria-controls="adminSidebar"
                                aria-label="Open navigation">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round">
                                <path d="M4 7h16M4 12h16M4 17h16"/>
                            </svg>
                        </button>

                        <div class="admin-topbar__heading">
                            <span class="admin-topbar__title">Management</span>
                            <span class="admin-topbar__eyebrow">WORKSPACE</span>
                        </div>
                    </div>

                    <!-- User dropdown -->
                    <div class="dropdown">

                        <button type="button"
                                class="admin-user-menu"
                                id="navbarDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            <span class="admin-user-menu__avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>

                            <span class="admin-user-menu__details">
                                <strong>{{ Auth::user()->name }}</strong>
                                <small>Administrator</small>
                            </span>

                            <svg class="admin-user-menu__chevron"
                                 viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="m7 10 5 5 5-5"/>
                            </svg>

                        </button>

                        <div class="dropdown-menu dropdown-menu-end admin-user-dropdown"
                             aria-labelledby="navbarDropdown">

                            <div class="admin-user-dropdown__header">
                                <strong>{{ Auth::user()->name }}</strong>
                                <small>{{ Auth::user()->email }}</small>
                            </div>

                            <div class="dropdown-divider"></div>

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST">
                                @csrf

                                <button type="submit" class="dropdown-item">
                                    Sign out
                                </button>
                            </form>

                        </div>
                    </div>

                </header>

                <!-- Page content -->
                <main class="admin-content">
                    @include('partials.flash-message')

                    @yield('content')
                </main>
            </div>
        </div>
    @else

        <!-- Guest / authentication layout -->
        <div class="auth-layout">

            <header class="auth-topbar">
                <a href="{{ route('login') }}" class="admin-brand">
                    <span class="admin-brand__mark">A</span>
                    <span class="admin-brand__text">
                        <strong>Admin Panel</strong>
                        <small>Management workspace</small>
                    </span>
                </a>
            </header>

            <main class="auth-content">
                @yield('content')
            </main>
        </div>
    @endauth

</div>
</body>
</html>
