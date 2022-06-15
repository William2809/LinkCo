@foreach ($postings as $posting)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-4 w-[56px]">
                <img class="w-14 h-14 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $posting->user->name }}">
            </div>
            <div class="w-[600px]">
                <div class="flex items-center">
                    <div class="text-heading4 text-lime-300 font-medium">
                        <a href="{{ route('profile', $posting->user->username) }}">{{ $posting->user->name }}</a>
                    </div>
                    <div class="ml-4 text-green-400">
                        {{ $posting->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="text-heading5 text-green-100 font-normal">
                    {{ $posting->body }}
                </div>
                <div class="flex">
                    <div class="mr-4">{{ $posting->totalLikes->count() }} Likes</div>
                    <div class="mr-4">{{ $posting->comments->count() }} Comments</div>
                </div>
                <div class="flex justify-between">
                    <form action="{{ route('like.store', $posting) }}" method="post">
                        @csrf
                        @if (Auth::user()->likes()->where('post_id', $posting->id)->exists())
                            <button type="submit">
                                <x-like>

                                </x-like>
                            </button>
                        @else
                            <button type="submit">
                                <x-unlike>

                                </x-unlike>
                            </button>
                        @endif
                    </form>
                    <x-comment :comments="$posting->comments" :posting="$posting"></x-comment>
                    {{-- @dd($posting->likes); --}}
                    {{-- @if ($posting->comments)
                    @endif --}}
                    <button><a href="https://wa.me/{{ $posting->user->phone }}">Contact</a></button>
                </div>
            </div>
        </div>
    </x-card>
@endforeach
