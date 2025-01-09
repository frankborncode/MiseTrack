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
                                <a href="/" class=" {{request()->is('/') ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                                <a href="/recipe" class=" {{request()->is('recipe') ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Create Recipe</a>
                                <a href="/recipes" class=" {{request()->is('recipes') ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Recipes</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>

        <x-header>Recipes List</x-header>
        <main>


        </main>
        <div class="flex items-center justify-center bg-gray-100 mt-5">

            <table class="block table-auto border-collapse border border-gray-300 font-light">
                <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 font-light text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 font-light text-left">Ingredients</th>
                    <th class="border border-gray-300 px-4 py-2 font-light text-left">Preparation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $recipe)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-left align-text-top">{{ $recipe['recipe_title'] }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-left align-text-top">
                            {{-- Split ingredients into list items --}}
                            <ul class="list-disc pl-4">
                                @foreach(explode("\n", $recipe['ingredients']) as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-left">
                            {{-- Split preparation steps into paragraphs --}}
                            @foreach(explode("\n", $recipe['preparation']) as $step)
                                <p class="mb-1">{{ $step }}</p>
                            @endforeach
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>

        <div class="mt-2 ml-2 mr-2">
            {{$recipes->links()}}
        </div>

    </div>
</body>
</html>
