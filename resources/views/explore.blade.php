<x-app-layout>


    <div class="pt-12">
        <div>
            <h1 class="text-heading1 font-semibold text-green-100">Post a Thread</h1>
        </div>

        <div class="flex text-green-100 justify-between">
            <div class="w-[800px]">


                <div class="">
                    <x-postings :postings="$postings"></x-postings>
                </div>
            </div>
            {{-- <div>
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

            </div> --}}

        </div>
    </div>
</x-app-layout>
