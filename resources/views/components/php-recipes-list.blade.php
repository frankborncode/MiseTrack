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
                <p>{{ $step }}</p>
            @endforeach
        </td>
    </tr>
@endforeach
