<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div>
            <h1 class="text-heading1 font-semibold text-green-100">Post a Thread</h1>
        </div>

        <div class="flex text-green-100 justify-between">
            <div class="w-[800px]">
                <x-card>
                    <div class="flex w-full">

                        <div class="flex-shrink-0 mr-4">
                            <img class="w-14 h-14 rounded-full" src="{{ Auth::user()->gravatar() }}"
                                alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="w-full">
                            <div>
                                <form action="{{ route('posting.store') }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <textarea name="body" id="body" class="w-full h-[80px] bg-green-800 border-2 border-lime-200 rounded-[16px] placeholder:text-green-600 focus:outline-none focus:border-lime-200 resize-none placeholder:text-heading6"
                                            placeholder="What's on your mind?"></textarea>
                                    </div>
                                    <div class="text-right">
                                        <x-button>Post</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </x-card>

                <div class="">
                    <x-postings :postings="$postings"></x-postings>
                </div>
            </div>
            <div>
                <x-card>
                    <div class="text-heading4 font-semibold text-lime-300 w-[350px]">
                        Trends
                    </div>
                    <div>
                        <a class="text-body mt-5">Health</a>
                        <a class="text-body mt-5">IoT</a>
                        <a class="text-body mt-5">Farm</a>
                        <a class="text-body mt-5">Energy</a>
                        <a class="text-body mt-5">Job Vacancy</a>
                    </div>
                </x-card>
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
                                            @if ($user->userType === 'Supplier')
                                                {{ $user->sector }} {{ $user->userType }} <p> .</p>
                                            @endif
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

        </div>
    </div>
</x-app-layout>
