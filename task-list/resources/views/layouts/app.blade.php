<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>P1-Task List</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .link {
            @apply font-medium text-blue-600 hover:underline
        }

        .btn {
            @apply px-4 py-2 font-bold text-white rounded-full cursor-pointer bg-blue-500 hover:bg-blue-700
        }

        .btn-green {
            @apply bg-lime-500 hover:bg-lime-700
        }

        .btn-red {
            @apply bg-rose-500 hover:bg-rose-700
        }

        .form label {
            @apply block mb-2 text-sm font-medium text-gray-900
        }

        .form input, .form textarea {
            @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
        }

        .txt-err {
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-disable --}}
    @yield('style')
</head>

<body class="container mx-auto mt-10 mb-10 mx-w-lg">

    <h1 class="mb-4 text-2xl font-bold">@yield('title')</h1>

    <div x-data="{ flash: true }">
        @if (session()->has('success'))
            <div x-show="flash"
                class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-700 rounded-md"
                role="alert">
                <strong>Success !</strong>
                <p>{{ session('success') }}</p>
                <div class="absolute cursor-pointer top-2 right-3" @click="flash= false">
                    X
                </div>
            </div>
        @endif

        <div class="mt-4">
            @yield('content')
        </div>
    </div>

</body>

</html>
