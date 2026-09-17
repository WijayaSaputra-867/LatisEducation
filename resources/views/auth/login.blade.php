@extends('layouts.auth')
@section('title', 'Login')
@section('card-title', 'Welcome Back')
@section('card-description', 'Login to access the student management system.')
@section('form')
    <form
        method="POST"
        action="{{ route('login') }}"
        class="space-y-5"
    >
        @csrf
        {{-- Email --}}
        <div>
            <label
                for="email"
                class="mb-2 block text-sm font-medium text-slate-700"
            >
                Email
            </label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="email"
                placeholder="you@example.com"
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
            >

            @error('email')
            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M18 10A8 8 0 1 1 2 10a8 8 0 0 1 16 0ZM9 5a1 1 0 0 1 2 0v4a1 1 0 1 1-2 0V5Zm1 8a1.25 1.25 0 1 0 0-2.5A1.25 1.25 0 0 0 10 13Z"
                        clip-rule="evenodd"
                    />
                </svg>

                {{ $message }}
            </p>
            @enderror
        </div>
        {{-- Password --}}
        <div>
            <div class="mb-2 flex items-center justify-between">

                <label
                    for="password"
                    class="block text-sm font-medium text-slate-700"
                >
                    Password
                </label>

            </div>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
            >

            @error('password')
            <p class="mt-2 flex items-center gap-1.5 text-sm text-red-600">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M18 10A8 8 0 1 1 2 10a8 8 0 0 1 16 0ZM9 5a1 1 0 0 1 2 0v4a1 1 0 1 1 2 0V5Zm1 8a1.25 1.25 0 1 0 0-2.5A1.25 1.25 0 0 0 10 13Z"
                        clip-rule="evenodd"
                    />
                </svg>

                {{ $message }}
            </p>
            @enderror
        </div>
        {{-- Link --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-slate-500">
                Don't have an account?
                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-slate-900 hover:underline"
                >
                    Create an account
                </a>
            </p>
        </div>
        {{-- Button --}}
        <button
            type="submit"
            class="w-full rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-900 focus:ring-offset-2"
        >
            Sign in
        </button>

    </form>
@endsection
