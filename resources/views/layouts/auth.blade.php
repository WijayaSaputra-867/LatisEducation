<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') — Latis Education</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-900">

<div class="min-h-screen grid lg:grid-cols-2">
    <div class="hidden lg:flex relative overflow-hidden bg-slate-900 p-12 text-white">

        <div class="relative z-10 flex flex-col justify-between w-full">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-slate-900 font-bold">
                        LE
                    </div>

                    <div>
                        <p class="font-semibold tracking-wide">
                            LATIS
                        </p>
                        <p class="text-xs text-slate-400">
                            EDUCATION
                        </p>
                    </div>
                </div>
            </div>

            <div class="max-w-lg">
                <p class="mb-4 text-sm font-medium text-slate-400 uppercase tracking-widest">
                    Student Management System
                </p>

                <h1 class="text-5xl font-bold leading-tight">
                    Manage student data
                    <span class="text-slate-400">
                        with ease.
                    </span>
                </h1>

                <p class="mt-6 max-w-md text-slate-400 leading-relaxed">
                    An integrated system designed to facilitate the management of
                    student data for LatisEducation and TutorIndonesia in a more
                    streamlined and structured manner.
                </p>
            </div>

            <div class="text-sm text-slate-500">
                © {{ date('Y') }} Latis Education
            </div>

        </div>

        <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full border border-slate-700"></div>
        <div class="absolute -bottom-40 -left-40 h-96 w-96 rounded-full border border-slate-700"></div>

    </div>


    <div class="flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">
            <div class="mb-10 lg:hidden">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-900 text-white font-bold">
                        LE
                    </div>

                    <div>
                        <p class="font-semibold">
                            LATIS EDUCATION
                        </p>
                        <p class="text-xs text-slate-500">
                            Student Management System
                        </p>
                    </div>
                </div>
            </div>


            <div class="mb-8">
                <h2 class="text-3xl font-bold tracking-tight">
                    @yield('card-title')
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    @yield('card-description')
                </p>
            </div>

            @yield('form')
        </div>
    </div>
</div>

</body>
</html>
