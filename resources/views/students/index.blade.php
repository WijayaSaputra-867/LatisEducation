@extends('layouts.app')

@section('title', 'Data Siswa')

@section('page-title', 'Data Siswa')

@section('page-description')
    Manage student data for LatisEducation and TutorIndonesia.
@endsection

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Student Data
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Manage and monitor data on enrolled students.
            </p>
        </div>

        <div class="flex w-full flex-col gap-2 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
            <a
                href="{{ route('students.export') }}"
                id="export-button"
                class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 sm:w-auto"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                    />
                </svg>
                Export Excel
            </a>

            <a
                href="{{ route('students.create') }}"
                class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-slate-800 sm:w-auto"
            >
                <svg
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4"
                    />
                </svg>
                Add Students
            </a>
        </div>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-slate-500">
                        Total Siswa
                    </p>

                    <p id="total-students" class="mt-2 text-2xl font-bold text-slate-900">
                        {{ $total_students }}
                    </p>
                </div>

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-slate-100">
                    <svg
                        class="h-5 w-5 text-slate-700"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-slate-500">
                        LatisEducation
                    </p>
                    <p
                        id="total-latis"
                        class="mt-2 text-2xl font-bold text-slate-900"
                    >
                        {{ $total_latis }}
                    </p>
                </div>

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-orange-50">
                    <span class="text-sm font-bold text-orange-600">
                        LE
                    </span>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:col-span-2 xl:col-span-1">
            <div class="flex items-center justify-between gap-4">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-slate-500">
                        TutorIndonesia
                    </p>

                    <p
                        id="total-tutor"
                        class="mt-2 text-2xl font-bold text-slate-900"
                    >
                        {{ $total_tutor }}
                    </p>
                </div>

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-blue-50">
                    <span class="text-sm font-bold text-blue-600">
                        TI
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-4 py-5 sm:px-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h2 class="font-semibold text-slate-900">
                        Student Roster
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Use the search function to search by NIS or name.
                    </p>
                </div>

                <div class="flex w-full flex-col gap-2 sm:flex-row sm:items-center lg:w-auto">
                    <label for="institution-filter" class="text-sm font-medium text-slate-600">
                        Institution
                    </label>

                    <select
                        id="institution-filter"
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-200 sm:w-auto"
                    >
                        <option value="">All Institutions</option>

                        @foreach ($institutions as $institution)
                            <option value="{{ $institution->id }}">
                                {{ $institution->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="students-table" class="w-full min-w-225 text-left text-sm">
                <thead class="bg-slate-50">
                <tr class="border-b border-slate-200">
                    <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        NIS
                    </th>

                    <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        Student Name
                    </th>

                    <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        Email
                    </th>

                    <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        Institution
                    </th>

                    <th class="px-4 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        Photo
                    </th>

                    <th class="px-4 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500 sm:px-6">
                        Action
                    </th>
                </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-4 py-4 sm:px-6">
                            {{ $student->nis }}
                        </td>
                        <td class="max-w-55 px-4 py-4 sm:px-6">
                            <span class="block truncate">
                                {{ $student->name }}
                            </span>
                        </td>

                        <td class="max-w-60 px-4 py-4 sm:px-6">
                            <span class="block truncate">
                                {{ $student->email }}
                            </span>
                        </td>

                        <td class="px-4 py-4 sm:px-6" data-institution-id="{{ $student->institution_id }}">
                            {{ $student->institution->name }}
                        </td>

                        <td class="px-4 py-4 sm:px-6">
                            @if ($student->photo)
                                <img
                                    src="{{ Storage::url($student->photo) }}"
                                    alt="{{ $student->name }}"
                                    class="h-10 w-10 rounded-lg object-cover"
                                >

                            @else
                                <span class="text-xs text-slate-400">
                                    No photo
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-4 text-right sm:px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a
                                    href="{{ route('students.edit', $student) }}"
                                    class="text-sm font-medium text-slate-700 hover:text-slate-900 hover:underline"
                                >
                                    Edit
                                </a>

                                <span class="text-slate-300">
                                    |
                                </span>

                                <form
                                    action="{{ route('students.destroy', $student) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus data siswa ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
