<x-app-layout>

    <div class="flex items-center mt-[140px]">

        <div class="text-green-100 flex flex-col ">
            <div class="text pb-[8px] mb-4">
                <p class="text-heading2 font-semibold">
                    User Account Type
                </p>
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('usertype.update') }}" class="w-[560px]">
                @csrf
                <div class=" text-lime-300 text-heading6 font-medium">
                    <div class="mb-4">
                        <input type="radio" name="userType" id="Business Owner" value="Business Owner"> Business Owner
                    </div>
                    <div class="mb-4">
                        <input type="radio" name="userType" id="Supplier" value="Supplier"> Supplier
                    </div>
                    <div class="mb-4">
                        <input type="radio" name="userType" id="Personal" value="Personal"> Personal

                    </div>
                </div>

                <x-button class="flex justify-center items-center w-[480px] mt-4">
                    <p>Continue</p>
                </x-button>
            </form>
        </div>
    </div>
</x-app-layout>
