<div>
    <x-dropcomment align="right" width="48">
        <x-slot name="trigger">
            <button>
                <x-commentIcon></x-commentIcon>
            </button>
        </x-slot>


        <x-slot name="content">
            <!-- Authentication -->

            @foreach ($comments as $comment)
                {{ $comment->body }}
            @endforeach


            <div>
                <form action="{{ route('comment.store', $posting) }}" method="post">
                    @csrf

                    <x-input id="body" type="text" name="body" placeholder="Add comment"></x-input>

                    <x-button>comment</x-button>
                </form>
            </div>
        </x-slot>
    </x-dropcomment>

</div>
