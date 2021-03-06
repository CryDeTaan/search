<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/search" method="get" class="space-y-2 mb-6">
                        <div class="flex items-baseline space-x-2">
                            <x-select id="user_id" name="user_id">
                                <option value="">All Users</option>
                                @foreach($users as $user)
                                    <option
                                        value="{{ $user->id }}"
                                        {{ request()->user_id == $user->id ? 'selected' : '' }}
                                    >
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input
                                id="search" name="search" type="search" placeholder="Search..." class="block w-full"
                                value="{{ request()->search }}"
                            />
                        </div>
                        <x-button>Search</x-button>
                    </form>

                    @if ($results)
                        <div class="space-y-4">
                            @if($results->count())
                                <em>Found {{ $results->total() }}</em>
                                @foreach($results as $result)
                                    <div>
                                        <h1 class="text-lg font-semibold">
                                            {{ $result->title }} #{{ $result->id }}
                                        </h1>
                                        <p>{{ $result->teaser }}</p>
                                        <p>{{ $result->user->name }}</p>
                                    </div>
                                @endforeach

                                {{ $results->links() }}

                            @else
                                <p>No results found</p>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
