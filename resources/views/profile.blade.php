@extends('layouts.app')

@section('title', 'Profile')
@section('page-title', 'Profile')

@section('page-description')
    Candidate profile and information.
@endsection

@section('content')
    <div class="mx-auto w-full max-w-3xl">
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
                <h2 class="text-lg font-semibold text-slate-900">
                    Candidate Profile
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Information about the candidate.
                </p>
            </div>

            <div class="flex flex-col items-center gap-6 px-6 py-8 sm:flex-row sm:items-start">
                <div class="shrink-0">
                    @if (file_exists(public_path('images/profile.png')))
                        <img
                            src="{{ asset('images/profile.png') }}"
                            alt="{{ auth()->user()->name }}"
                            class="h-32 w-32 rounded-2xl object-cover ring-4 ring-slate-100"
                        >
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-2xl bg-slate-900 text-4xl font-bold text-white ring-4 ring-slate-100">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div class="min-w-0 flex-1 text-center sm:text-left">
                    <p class="text-sm font-medium text-slate-500">
                        Candidate Name
                    </p>

                    <h1 class="mt-1 text-2xl font-bold text-slate-900">
                        Muhammad Wijaya Saputra
                    </h1>

                    <p class="mt-4 text-sm font-medium text-slate-500">
                        Position
                    </p>

                    <p class="mt-1 text-base font-semibold text-slate-900">
                        IT Specialist / Fullstack Developer
                    </p>

                    <p class="mt-4 text-sm font-medium text-slate-500">
                        Email
                    </p>

                    <p class="mt-1 text-sm text-slate-600">
                        wijayasaputra679@gmail.com
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
