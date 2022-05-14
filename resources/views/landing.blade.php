<x-guest-layout>

    <div class="flex items-center justify-between antialiased">
        <div>
            <p class="text-[80px] text-lime-300 font-semibold">
                Business Connection
            </p>
            <p class="mt-5 w-[480px] text-heading6 font-medium text-green-100">
                Find your business connection as easy as scrolling a social media. Be ready to meet thousands of
                business owners and suppliers!
            </p>
            <div class="mt-8">
                <a href="{{ route('register') }}"
                    class="inline-flex justify-center items-center px-4 py-2 text-green-800 bg-lime-300 h-[64px] w-[200px] text-heading5 font-semibold rounded-[16px] hover:bg-lime-700 hover:text-lime-400 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">Get
                    Started</a>
            </div>
        </div>
        <div class="">
            <x-landing-illustration />
        </div>
    </div>

</x-guest-layout>
