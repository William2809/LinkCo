<x-app-layout>
    <div class="pt-12">
        <div>
            <h1 class="text-heading1 font-semibold text-green-100">Followings</h1>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-5">
        @foreach ($followings as $user)
            {{-- {{ $user->name }} --}}
            <x-card>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-4">
                            <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $user->name }}">
                        </div>
                        <div>
                            <a href="{{ route('profile', $user->username) }}" class="text-body text-green-100">
                                {{ $user->name }}
                            </a>

                            <div class="text-sm text-lime-300">
                                {{-- {{ $user->created_at->diffForHumans() }} --}}
                                {{-- {{ $user->pivot->created_at->diffForHumans() }} --}}
                                @if ($user->pivot)
                                    {{ $user->pivot->created_at->diffForHumans() }}
                                @endif
                            </div>
                        </div>
                    </div>

                    <div>
                        @if (Auth::user()->isNot($user))
                            <form action="{{ route('following.store', $user) }}" method="post">
                                @csrf
                                <div class="">
                                    <x-buttonFollow>
                                        @if (Auth::user()->followings()->where('followed_user_id', $user->id)->first())
                                            Unfollow
                                        @else
                                            Follow
                                        @endif
                                    </x-buttonFollow>
                                </div>

                            </form>
                        @endif
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
</x-app-layout>
