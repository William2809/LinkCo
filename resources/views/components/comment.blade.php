<div>
    <x-dropcomment align="right" width="48">
        <x-slot name="trigger">
            <button>
                <x-commentIcon></x-commentIcon>
            </button>
        </x-slot>


        <x-slot name="content">
            <div class=" bg-green-700 rounded-[16px] py-6 px-6 w-[450px]">
                <!-- Authentication -->
                <div>
                    <form action="{{ route('comment.store', $posting) }}" method="post">
                        @csrf

                        <div class="flex justify-between items-center">
                            <input id="body" type="text" name="body" placeholder="Add comment" required
                                class="w-[320px] placeholder:text-green-200 outline-none border-x-0 border-t-0 border-b-2 border-lime-300 bg-green-700 h-[48px] mr-2">


                            <button
                                class="inline-flex items-center px-4 py-2 text-green-700 bg-lime-300 h-[48px] text-heading6 font-medium rounded-[16px] hover:bg-lime-800 hover:text-green-200 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 ml-2">
                                Post
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-5 mb-5">
                    @foreach ($comments as $comment)
                        <div class="flex my-3 items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex-shrink-0  w-[56px]">
                                    <a href="{{ route('profile', $posting->user->username) }}">
                                        <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                            alt="{{ $posting->user->name }}">
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{ route('profile', $posting->user->username) }}"
                                        class="font-semibold text-lime-300">{{ $comment->user->username }}</a>&nbsp;
                                    {{ $comment->body }}
                                </div>
                            </div>
                            @if ($comment->user->id === Auth::user()->id)
                                <div>
                                    <form action="{{ route('comment.delete', $comment) }}" method="post">
                                        @csrf
                                        <button>
                                            <x-trashIcon></x-trashIcon>
                                        </button>
                                    </form>

                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>


            </div>
        </x-slot>
    </x-dropcomment>
</div>
