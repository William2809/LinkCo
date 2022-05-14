@foreach ($postings as $posting)
    <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-4">
                <img class="w-14 h-14 rounded-full" src="https://i.pravatar.cc/150" alt="{{ $posting->user->name }}">
            </div>
            <div>
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
                    <div class="mr-4">{{ $posting->like }} Like</div>
                    <div class="mr-4">{{ $posting->comment }} Comments</div>
                </div>
                <div class="flex justify-between">
                    <button>Like</button>
                    <button>Comment</button>
                    <button>Share</button>
                    <button>Contact</button>
                </div>
            </div>
        </div>
    </x-card>
@endforeach
