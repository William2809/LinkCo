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
                            <p class="text-heading5 text-green-100 ml-4">Sector || Role</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-8 flex justify-center items-center">
                                <x-location-icon class="w-10"></x-location-icon>
                            </div>
                            <p class="text-heading5 text-green-100 ml-4">Location, country</p>
                        </div>

                        @if (Auth::user()->isNot($user))
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
                            <div class="mt-6">
                                <x-button>Contact Me</x-button>
                            </div>
                        @else
                            <div class="mt-6">
                                <x-button>Setting</x-button>
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
                        <a class="text-green-100 text-center px-8">
                            <p class="text-heading4 font-semibold">0</p>
                            <p class="text-heading5 font-normal">Following</p>
                        </a>
                        <a class="text-green-100 text-center px-8">
                            <p class="text-heading4 font-semibold">0</p>
                            <p class="text-heading5 font-normal">Follower</p>
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
                            TNF is an independent network operator and we are based in Alkmaar, North Holland.
                            As a full MVNO we deliver high-quality mobile communication services worldwide. As a
                            result
                            we have a strong position in the purchase and sales of international mobile data.

                            Because of our global coverage, with more than 750 networks in 200 countries, we can
                            offer a
                            complete international M2M & IOT portfolio. No matter what usage, so for high, medium
                            and
                            low volume connectivity.

                            Our fixed connectivity portfolio offers an end-to-end solution. So we are delivering
                            internet connectivity, on all connection types available. Access like DIA, FTTX, VDSL
                            and
                            Broadband services. We deliver these services in Europe carrier neutral supporting all
                            operators active at great wholesale level pricing.
                        </p>
                    </div>
                    <div id="posts" class="hidden">
                        <x-postings :postings="$postings"></x-postings>
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
                                            {{ $user->name }}
                                        </div>
                                        <div class="flex">
                                            <div class="text-body text-lime-300">
                                                {{ $user->role }}
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
