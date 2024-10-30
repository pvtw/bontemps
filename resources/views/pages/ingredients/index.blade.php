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

            <table class="w-full mt-4 dark:text-white">
                <thead class="font-bold">
                    <tr>
                        <td class="p-2">{{ __('ID') }}</td>
                        <td class="w-full p-2">{{ __('Name') }}</td>
                        <td class="p-2">{{ __('Actions') }}</td>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($ingredients as $ingredient)
                        <tr>
                            <td class="p-2">{{ $ingredient->id }}</td>
                            <td class="p-2">{{ $ingredient->name }}</td>
                            <td class="p-2">
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