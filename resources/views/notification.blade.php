<x-app-layout>
    <div class="pt-12">
        <div>
            <h1 class="text-heading1 font-semibold text-green-100">Notification</h1>
        </div>

        <div class="flex text-green-100 justify-between">
            <div class="w-[1296px] flex">


                <div>
                    <div class="mb-5 text-heading4 font-semibold text-lime-300 w-[350px]">
                        Followings
                    </div>
                    <div>
                        <div>
                            @foreach (Auth::user()->followings()->limit(5)->get()
    as $user)
                                <div class="w-[320px]">
                                    <x-card>
                                        <div class="flex">
                                            <div class="flex-shrink-0 mr-4">
                                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                                    alt="{{ $user->name }}">
                                            </div>
                                            <div>
                                                <div class="text-body text-green-100 font-medium">
                                                    <a
                                                        href="{{ route('profile', $user->username) }}">{{ $user->name }}</a>
                                                </div>
                                                <div class="flex">
                                                    <div class=" text-body text-lime-300">
                                                        {{ $user->pivot->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </x-card>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <div>
                    <div>
                        <div class="mb-5 text-heading4 font-semibold text-lime-300 w-[350px]">
                            Followers
                        </div>
                        <div>
                            <div>
                                @foreach (Auth::user()->followers()->limit(5)->get()
    as $user)
                                    <div class="w-[320px]">
                                        <x-card>
                                            <div class="flex">
                                                <div class="flex-shrink-0 mr-4">
                                                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                                        alt="{{ $user->name }}">
                                                </div>
                                                <div>
                                                    <div class="text-body text-green-100 font-medium">
                                                        <a
                                                            href="{{ route('profile', $user->username) }}">{{ $user->name }}</a>
                                                    </div>
                                                    <div class="flex">
                                                        <div class=" text-body text-lime-300">
                                                            {{ $user->pivot->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </x-card>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>



                <div>
                    <div>
                        <div class="mb-5 text-heading4 font-semibold text-lime-300 w-[350px]">
                            Comments
                        </div>
                        <div>
                            <div>
                                @foreach (Auth::user()->postings()->get()
    as $posting)
                                    @foreach ($posting->comments as $comment)
                                        <div class="w-[320px]">
                                            <x-card>
                                                <div class="flex">
                                                    <div class="flex-shrink-0 mr-4">
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="https://i.pravatar.cc/150"
                                                            alt="{{ $comment->user->username }}">
                                                    </div>
                                                    <div>
                                                        <div class="text-body text-green-100 font-medium">
                                                            <a
                                                                href="{{ route('profile', $comment->user->username) }}">{{ $comment->user->name }}</a>
                                                        </div>
                                                        <div class="">
                                                            <div class=" text-body text-lime-300">
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </div>
                                                            <div class="text-body text-green-100">
                                                                {{ $comment->body }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-card>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <div>
                    <div>
                        <div class="mb-5 text-heading4 font-semibold text-lime-300 w-[350px]">
                            Likes
                        </div>
                        <div>
                            <div>
                                @foreach (Auth::user()->postings()->get()
    as $posting)
                                    @foreach ($posting->totalLikes as $like)
                                        @foreach ($users as $user)
                                            @if ($user->id == $like->id && $like->id !== Auth::user()->id)
                                                <div class="w-[320px]">
                                                    <x-card>
                                                        {{-- {{ $posting->id }} --}}
                                                        <div class="flex">
                                                            <div class="flex-shrink-0 mr-4">
                                                                <img class="w-10 h-10 rounded-full"
                                                                    src="https://i.pravatar.cc/150"
                                                                    alt="{{ $user->username }}">
                                                            </div>
                                                            <div>
                                                                <div class="text-body text-green-100 font-medium">
                                                                    <a
                                                                        href="{{ route('profile', $user->username) }}">{{ $user->name }}</a>
                                                                </div>
                                                                <div class="">
                                                                    <div class=" text-body text-lime-300">
                                                                        {{ $like->pivot->created_at->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </x-card>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>




            </div>

</x-app-layout>
