<x-app-layout>
    <div class="mt-[40px]">
        <div class="flex justify-between">
            <div class="flex items-center">
                <div>
                    <img class="w-[200px] h-[200px] rounded-full" src="https://i.pravatar.cc/150"
                        alt="{{ $user->name }}">
                </div>

                <div class="ml-10">
                    <div class="flex justify-center items-center">
                        <h1 class="text-heading3 text-green-100 font-semibold">{{ $user->name }}</h1>
                        <a href="">
                            <x-more-icon></x-more-icon>
                        </a>
                    </div>
                    <div>
                        <div class="flex items-center">
                            <div class="w-8 flex justify-center items-center">
                                <x-briefcase-icon class="w-10"></x-briefcase-icon>
                            </div>
                            <p class="text-heading5 text-lime-300 ml-4"> {{ $user->sector }} ||
                                {{ $user->userType }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 flex justify-center items-center">
                                <x-location-icon class="w-10"></x-location-icon>
                            </div>
                            <p class="text-heading5 text-green-100 ml-4"> {{ $user->country }}</p>
                        </div>

                        @if (Auth::user()->isNot($user))
                            <div class="flex">
                                <form action="{{ route('following.store', $user) }}" method="post">
                                    @csrf
                                    <div class="mt-6">
                                        <x-button>
                                            @if (Auth::user()->followings()->where('followed_user_id', $user->id)->first())
                                                Unfollow
                                            @else
                                                Follow
                                            @endif
                                        </x-button>
                                    </div>
                                </form>
                                <div class="mt-6 ml-4">
                                    <x-button><a href="https://wa.me/{{ $user->phone }}">Contact Me</a></x-button>
                                </div>
                            </div>
                        @else
                            <div class="mt-6">
                                <x-button><a href="{{ route('detail', Auth::user()->username) }}">Setting</a>
                                </x-button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div>
                <x-card>
                    <div class="flex justify-between items-center">
                        <a href="" class="text-green-100 text-center px-8">
                            <p class="text-heading4 font-semibold">{{ $user->postings->count() }}</p>
                            <p class="text-heading5 font-normal">Posts</p>
                        </a>
                        <a href="{{ route('profile.followings', $user->username) }}"
                            class="text-green-100 text-center px-8">
                            <p class="text-heading4 font-semibold">{{ $user->followings->count() }}</p>
                            <p class="text-heading5 font-normal">Followings</p>
                        </a>
                        <a href="{{ route('profile.followers', $user->username) }}"
                            class="text-green-100 text-center px-8">
                            <p class="text-heading4 font-semibold">{{ $user->followers->count() }}</p>
                            <p class="text-heading5 font-normal">Followers</p>
                        </a>
                    </div>
                </x-card>
            </div>
        </div>
        <div class="flex justify-between text-green-100">
            <div class="w-[600px]">
                <x-card>
                    <div class="flex mb-5">
                        <div class="pr-3">
                            {{-- <a href="" class="text-heading5 text-lime-300 font-semibold">Background</a> --}}
                            <button onclick="toggleBackground()" class="text-heading5 text-lime-300 font-semibold"
                                id="btn-background">Background
                            </button>

                        </div>
                        <div class="px-3">
                            <button onclick="togglePosts()" class="text-heading5 text-green-600 font-semibold"
                                id="btn-posts">Posts
                            </button>


                            {{-- <a href="" class="text-heading5 text-green-600 font-semibold">Posts</a> --}}
                        </div>
                    </div>
                    <div id="background" class="block">
                        <p class="text-green-100 text-heading6 font-normal">
                            {{ $user->background }}
                        </p>
                    </div>
                    <div id="posts" class="hidden">
                        <x-postings :postings="$user->postings"></x-postings>
                    </div>
                </x-card>
            </div>
            @if (Auth::user()->is($user))
                <div>
                    <x-card>
                        <div class="mb-5 text-heading4 font-semibold text-lime-300 w-[350px]">
                            Recently follows
                        </div>
                        <div>
                            @foreach (Auth::user()->followings()->limit(5)->get()
    as $user)
                                <div class="flex">
                                    <div class="flex-shrink-0 mr-4">
                                        <img class="w-14 h-14 rounded-full" src="https://i.pravatar.cc/150"
                                            alt="{{ $user->name }}">
                                    </div>
                                    <div>
                                        <div class="text-heading4 text-green-100 font-medium">
                                            <a
                                                href="{{ route('profile', $user->username) }}">{{ $user->name }}</a>
                                        </div>
                                        <div class="flex">
                                            <div class="text-body text-lime-300">
                                                {{ $user->userType }}&nbsp;
                                            </div>
                                            <div class=" text-body text-lime-300">
                                                {{ $user->pivot->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </x-card>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
    function toggleBackground() {
        var background = document.getElementById("background");
        var post = document.getElementById("posts");
        var btn_background = document.getElementById("btn-background");
        var btn_posts = document.getElementById("btn-posts");
        if (background.style.display != "block") {
            post.style.display = "none";
            background.style.display = "block";

            btn_background.style.color = "rgb(152 245 118)";
            btn_posts.style.color = "rgb(89 146 126)";

        }
    }

    function togglePosts() {
        var background = document.getElementById("background");
        var post = document.getElementById("posts");
        var btn_background = document.getElementById("btn-background");
        var btn_posts = document.getElementById("btn-posts");
        if (post.style.display != "block") {
            background.style.display = "none";
            post.style.display = "block";

            btn_background.style.color = "rgb(89 146 126)";
            btn_posts.style.color = "rgb(152 245 118)";

        }
    }
</script>
