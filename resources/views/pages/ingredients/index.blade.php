<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingredients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <x-link href="{{ route('ingredients.create') }}">Create ingredient</x-link>
            </div>

            <table class="w-full table-auto divide-y divide-gray-200 text-start text-black dark:text-white dark:divide-white/5 mt-4">
                <thead class="divide-y divide-gray-200 dark:divide-white/5">
                    <tr class="bg-gray-50 dark:bg-white/5">
                        <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">{{ __('ID') }}</th>
                        <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 w-full">{{ __('Name') }}</th>
                        <th class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">{{ __('Actions') }}</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                    @forelse ($ingredients as $ingredient)
                        <tr class="[@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                            <td class="p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">{{ $ingredient->id }}</td>
                            <td class="p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">{{ $ingredient->name }}</td>
                            <td class="p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                <span class="flex items-center gap-4">
                                    <x-link href="{{ route('ingredients.edit', $ingredient) }}">Edit</x-link>
                                    <form method="post" action="{{ route('ingredients.destroy', $ingredient) }}">
                                        @csrf
                                        @method('delete')

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete Ingredient') }}
                                        </x-danger-button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-2">No ingredients found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>