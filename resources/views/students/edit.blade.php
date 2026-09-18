@extends('layouts.app')

@section('title', 'Edit Student')

@section('page-title', 'Edit Student')

@section('page-description')
    Update student information in the system.
@endsection

@section('content')
    <div class="mx-auto w-full max-w-4xl">
        {{-- Back --}}
        <div class="mb-6">
            <a
                href="{{ route('students.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-slate-900"
            >
                <svg
                    class="h-4 w-4 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>
                Back to Student Data
            </a>
        </div>

        {{-- Form Card --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            {{-- Header --}}
            <div class="border-b border-slate-200 px-4 py-5 sm:px-6">
                <h2 class="text-lg font-semibold text-slate-900">
                    Student Information
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Update the student information on the form below.
                </p>
            </div>

            {{-- Form --}}
            <form
                action="{{ route('students.update', $student) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <div class="space-y-6 p-4 sm:p-6">
                    {{-- Institution --}}
                    <div>
                        <label
                            for="institution_id"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Institution
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="institution_id"
                            name="institution_id"
                            class="block w-full rounded-lg border px-4 py-2.5 text-sm outline-none transition
                            {{ $errors->has('institution_id')
                                ? 'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100'
                                : 'border-slate-300 focus:border-slate-500 focus:ring-2 focus:ring-slate-200' }}"
                        >
                            <option value="">
                                Select an Institution
                            </option>

                            @foreach ($institutions as $institution)
                                <option
                                    value="{{ $institution->id }}"
                                    @selected(old('institution_id', $student->institution_id) == $institution->id)
                                >
                                    {{ $institution->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('institution_id')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- NIS --}}
                    <div>
                        <label
                            for="nis"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            NIS
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="nis"
                            name="nis"
                            value="{{ old('nis', $student->nis) }}"
                            inputmode="numeric"
                            autocomplete="off"
                            placeholder="Enter your NIS"
                            class="block w-full rounded-lg border px-4 py-2.5 text-sm outline-none transition
                            {{ $errors->has('nis')
                                ? 'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100'
                                : 'border-slate-300 focus:border-slate-500 focus:ring-2 focus:ring-slate-200' }}"
                        >

                        <p class="mt-1.5 text-xs text-slate-400">
                            The NIS must consist of numbers and be unique.
                        </p>

                        @error('nis')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Name --}}
                    <div>
                        <label
                            for="name"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Student Name
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $student->name) }}"
                            autocomplete="name"
                            placeholder="Enter the student's name"
                            class="block w-full rounded-lg border px-4 py-2.5 text-sm outline-none transition
                            {{ $errors->has('name')
                                ? 'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100'
                                : 'border-slate-300 focus:border-slate-500 focus:ring-2 focus:ring-slate-200' }}"
                        >

                        @error('name')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Email
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $student->email) }}"
                            autocomplete="email"
                            placeholder="example@email.com"
                            class="block w-full rounded-lg border px-4 py-2.5 text-sm outline-none transition
                            {{ $errors->has('email')
                                ? 'border-red-400 focus:border-red-500 focus:ring-2 focus:ring-red-100'
                                : 'border-slate-300 focus:border-slate-500 focus:ring-2 focus:ring-slate-200' }}"
                        >

                        @error('email')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Photo --}}
                    <div>
                        <label
                            for="photo"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Photo
                        </label>

                        @if ($student->photo)
                            <div class="mb-4 flex items-center gap-4 rounded-lg border border-slate-200 bg-slate-50 p-3">
                                <img
                                    src="{{ Storage::url($student->photo) }}"
                                    alt="{{ $student->name }}"
                                    class="h-16 w-16 shrink-0 rounded-lg object-cover"
                                >

                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-slate-700">
                                        Current Photo
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        Upload a new photo to replace it.
                                    </p>
                                </div>
                            </div>
                        @endif

                        <div class="rounded-lg border-2 border-dashed border-slate-300 p-4 text-center transition hover:border-slate-400 sm:p-6">
                            <input
                                type="file"
                                id="photo"
                                name="photo"
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="block w-full min-w-0 text-sm text-slate-500 file:mr-2 file:rounded-lg
                                file:border-0 file:bg-slate-900 file:px-3 file:py-2
                                file:text-sm file:font-medium file:text-white
                                hover:file:bg-slate-800 sm:file:mr-4 sm:file:px-4"
                            >

                            <p class="mt-3 text-xs text-slate-400">
                                Format JPG atau PNG, maksimal 100 KB.
                            </p>
                        </div>

                        @error('photo')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex flex-col-reverse gap-2 border-t border-slate-200 bg-slate-50 px-4 py-4 sm:flex-row sm:items-center sm:justify-end sm:gap-3 sm:px-6">
                    <a
                        href="{{ route('students.index') }}"
                        class="inline-flex w-full items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100 sm:w-auto"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-slate-900 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-slate-800 sm:w-auto"
                    >
                        Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
