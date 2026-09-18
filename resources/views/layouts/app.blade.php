<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Student Management System')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-slate-100 text-slate-800">
<div class="min-h-screen">
    <div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-slate-900/50 backdrop-blur-sm lg:hidden"></div>

    <aside
        id="sidebar"
        class="fixed inset-y-0 left-0 z-50 flex w-72 -translate-x-full flex-col bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:w-64 lg:translate-x-0"
    >
        {{-- Brand --}}
        <div class="flex h-16 shrink-0 items-center justify-between border-b border-slate-800 px-6">

            <div>
                <h1 class="text-lg font-bold tracking-wide">
                    LATIS
                </h1>

                <p class="text-xs text-slate-400">
                    Student Management
                </p>
            </div>
            {{-- Close mobile sidebar --}}
            <button
                id="close-sidebar"
                type="button"
                class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-800 hover:text-white lg:hidden"
                aria-label="Close sidebar"
            >
                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
        {{-- Navigation --}}
        <nav class="flex-1 space-y-1 overflow-y-auto p-4">

            {{-- Student --}}
            <a
                href="{{ route('students.index') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('students.*')
                    ? 'bg-white text-slate-900'
                    : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14l6.16-3.42M12 14v7"
                    />
                </svg>

                <span>
                    Student
                </span>
            </a>
            {{-- Profile --}}
            <a
                href="{{ route('profile') }}"
                class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                {{ request()->routeIs('profile')
                    ? 'bg-white text-slate-900'
                    : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
            >
                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                </svg>

                <span>
                    Profile
                </span>
            </a>
        </nav>

        <div class="shrink-0 border-t border-slate-800 p-4">
            <div class="mb-3 px-2">
                <p class="truncate text-sm font-medium">
                    {{ auth()->user()->name }}
                </p>

                <p class="truncate text-xs text-slate-400">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-red-500/10 hover:text-red-400"
                >
                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12a9 9 0 0118 0"
                        />
                    </svg>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>

    <main class="min-h-screen lg:ml-64">
        <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-4 sm:px-6 lg:px-8">
            {{-- Left --}}
            <div class="flex min-w-0 items-center gap-3">
                {{-- Mobile menu --}}
                <button
                    id="open-sidebar"
                    type="button"
                    class="flex shrink-0 items-center justify-center rounded-lg p-2 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 lg:hidden"
                    aria-label="Open sidebar"
                >

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>

                {{-- Page title --}}
                <div class="min-w-0">
                    <h2 class="truncate text-base font-semibold text-slate-900 sm:text-lg">
                        @yield('page-title')
                    </h2>

                    @hasSection('page-description')
                        <p class="hidden truncate text-sm text-slate-500 sm:block">
                            @yield('page-description')
                        </p>
                    @endif
                </div>
            </div>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">
                {{-- Desktop user info --}}
                <div class="hidden text-right sm:block">
                    <p class="max-w-48 truncate text-sm font-medium text-slate-800">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="max-w-48 truncate text-xs text-slate-500">
                        {{ auth()->user()->email }}
                    </p>
                </div>
                {{-- Avatar --}}
                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slate-900 text-sm font-semibold text-white sm:h-10 sm:w-10">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <div class="p-4 sm:p-6 lg:p-8">
            {{-- Success --}}
            @if (session('success'))
                <div class="mb-6 flex items-start gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                    <svg
                        class="mt-0.5 h-5 w-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            @endif
            {{-- Error --}}
            @if (session('error'))
                <div class="mb-6 flex items-start gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <svg
                        class="mt-0.5 h-5 w-5 shrink-0"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                    <span>
                        {{ session('error') }}
                    </span>
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
