<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiseTrack</title>
    {{-- Load TailwindCSS and other Vite-managed assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<div class="min-h-full">
    <nav class="bg-gray-700">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <x-project-icon></x-project-icon>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/" class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                            <a href="/recipe/create" class="{{ request()->is('recipe/create') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Create Recipe</a>
                            <a href="/recipe" class="{{ request()->is('recipe') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Recipes</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <x-header>Create Recipe</x-header>

    <main class="ml-3 mt-3">

        <form method="POST" action="/recipe" class="max-w-sm mx-auto">
            @csrf

            <div class="mb-1 mt-2">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900 text-black font-semibold">Title ✏</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Enter Title"
                    class="block mb-2 bg-gray-700 border rounded-lg text-white w-full p-2"
                />
            </div>
            @error('title')
            {{ $message }}
            @enderror

            <div class="mb-2 mt-2">
                <label for="ingredients" class="block mb-2 text-sm font-medium text-gray-900 text-black font-semibold">Ingredients 🥔 🥚</label>
                <textarea
                    id="ingredients"
                    name="ingredients"
                    placeholder="Enter each ingredient on a separate line"
                    rows="10"
                    class="p-2 text-start resize-none border border-gray-300 text-gray-900 rounded-lg block w-full bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                ></textarea>
            </div>
            @error('ingredients')
            {{ $message }}
            @enderror

            <div class="mb-2 mt-2">
                <label for="preparation" class="block mb-2 text-sm font-medium text-gray-900 text-black font-semibold">Describe Preparation ✏</label>
                <textarea
                    id="preparation"
                    name="preparation"
                    placeholder="Describe preparation steps on a separate line"
                    rows="10"
                    class="p-2 text-start resize-none border border-gray-300 text-gray-900 rounded-lg block w-full bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                ></textarea>
            </div>
                @error('preparation')
                    {{ $message }}
                @enderror

{{--            <div class="mt-5 mb-5">--}}
{{--                @if($errors->any())--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $error)--}}
{{--                            <li class="text-red-500 italic">{{$error}}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
{{--            </div>--}}

            <div>
                <button
                    type="submit"
                    class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Recipe
                </button>
            </div>
        </form>
    </main>

</div>
</body>
</html>
