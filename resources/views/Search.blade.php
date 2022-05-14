<x-app-layout>
    <div class="flex">
        <div>
            <x-back-icon></x-back-icon>
        </div>
        <div>
            <form action="/search" method="get">
                <div class="relative text-green-100 focus-within:text-green-100 ">
                    <span class=" absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 ">
                            <x-searchIcon class=""></x-searchIcon>
                        </button>
                    </span>
                    <input type="search" name="search"
                        class="border-none py-2 text-heading6 text-white bg-green-800 text-green-100 rounded-[16px] pl-14 focus:outline-none placeholder:text-green-100 h-[50px] w-[1280px]"
                        placeholder="Search Person" autocomplete="off" value="{{ request('search') }}">
                </div>
            </form>
        </div>
    </div>
    <div>

    </div>
    @if ($users->count())
        <div class="grid grid-cols-2 gap-2 justify-items-center">
            @foreach ($users as $user)
                <div class="w-[560px]">
                    <x-card>
                        <div class="flex items-center">
                            <div>
                                <img class="w-14 h-14 rounded-full" src="https://i.pravatar.cc/150"
                                    alt="{{ $user->name }}">
                            </div>
                            <div class="ml-4 flex justify-between w-[400px]">
                                <div>
                                    <div class="text-heading5 text-green-100 font-semibold w-[280px]">
                                        <a href="{{ route('profile', $user->username) }}">{{ $user->name }}</a>
                                    </div>
                                    <div class="text-lime-300 text-heading6">
                                        role
                                    </div>
                                </div>
                                <div class="text-lime-300 text-heading6 w-[120px]">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <x-location-search-icon></x-location-search-icon>
                                        </div>
                                        <p class="pb-2">place</p>
                                    </div>
                                    <div>
                                        {{ $user->followings->count() }} followers
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-card>
                </div>
            @endforeach

        </div>
    @else
        <div class="flex justify-center items-center h-[350px]">
            <p class="text-heading3 text-green-100 font-semibold">User not found.</p>
        </div>
    @endif
</x-app-layout>
