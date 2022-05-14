<x-app-layout>
    @if (session()->has('message'))
        <div class="bg-green-600 text-white p-4">
            {{ session()->get('message') }}
        </div>
    @endif
    <a href="{{ route('home') }}" class="text-lime-300 text-heading3 font-semibold">Back</a>

    <div class="flex justify-between">

        {{-- Menu --}}
        <div>
            <div>
                <img class="w-[200px] h-[200px] rounded-full" src="https://i.pravatar.cc/150" alt="{{ $user->name }}">
            </div>
            <div class="mt-[20px]">
                <button id="btn-yourProfile" onclick="yourProfile()"
                    class="text-green-700 text-heading5 border-2 border-lime-300 font-semibold bg-lime-300 rounded-[16px] w-[280px] h-[56px]">Your
                    Profile</button>
            </div>
            <div class="mt-[20px]">
                <button id="btn-editProfile" onclick="editProfile()"
                    class="text-lime-300 text-heading5 font-semibold rounded-[16px] w-[280px] h-[56px] border-2 border-lime-300">Edit
                    Profile</button>
            </div>
            <div class="mt-[20px]">
                <button id="btn-profileBackground" onclick="profileBackground()"
                    class="text-lime-300 text-heading5 font-semibold rounded-[16px] w-[280px] h-[56px] border-2 border-lime-300">Profile
                    Background</button>
            </div>
            <div class="mt-[20px]">
                <button id="btn-changePassword" onclick="changePassword()"
                    class="text-lime-300 text-heading5 font-semibold rounded-[16px] w-[280px] h-[56px] border-2 border-lime-300">Change
                    Password</button>
            </div>

        </div>

        {{-- content --}}
        <div class="w-[880px]">
            {{-- Your Profile --}}
            <div id="yourProfile" class="block">
                <div>
                    <p class="text-heading2 text-green-100 font-semibold">Account</p>
                    <p class="text-heading4 text-lime-300 font-semibold">Profile</p>
                </div>
                <div class="text-lime-300 mt-[56px]">
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4">
                        <p class="font-normal">Username</p>
                        <p class="text-green-100 font-medium">{{ $user->username }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4 mt-5">
                        <p class="font-normal">Email</p>
                        <p class="text-green-100 font-medium">{{ $user->email }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4 mt-5">
                        <p class="font-normal">Phone</p>
                        <p class="text-green-100 font-medium">{{ $user->phone }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4 mt-5">
                        <p class="font-normal">DOB</p>
                        <p class="text-green-100 font-medium">{{ $user->dob }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4 mt-5">
                        <p class="font-normal">Country</p>
                        <p class="text-green-100 font-medium">{{ $user->country }}</p>
                    </div>
                    <div class="flex justify-between items-center border-b-2 border-lime-300 text-heading4 mt-5">
                        <p class="font-normal">Gender</p>
                        <p class="text-green-100 font-medium">{{ $user->gender }}</p>
                    </div>
                </div>
            </div>
            {{-- Edit Profile --}}
            <div id="editProfile" class="hidden">
                <div>
                    <p class="text-heading2 text-green-100 font-semibold">Account</p>
                    <p class="text-heading4 text-lime-300 font-semibold">Edit Profile</p>
                </div>
                <div class="text-lime-300 mt-[56px]">
                    <form action="{{ route('profile.update', Auth::user()->username) }}" method="POST">
                        @csrf
                        @method("put")
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Email</p>
                            <x-inputDetail type="email" name="email" id="email" value="{{ $user->email }}">
                            </x-inputDetail>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Phone</p>
                            <x-inputDetail type="text" name="phone" id="phone" value="{{ $user->phone }}">
                            </x-inputDetail>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Sector</p>
                            <select id="sector" name="sector"
                                class="form-select  mb-3 h-[68px] appearance-none block w-full px-4 py-2 text-heading6 font-normal text-green-100 bg-green-900 bg-clip-padding bg-no-repeat border-solid border-lime-300 border-2 rounded-[12px] transition ease-in-out m-0 focus:text-green-700 focus:bg-lime-300 focus:border-lime-500 focus:outline-none">
                                <option selected>{{ $user->sector }}</option>
                                <option value="Health">Health</option>
                                <option value="IoT">IoT</option>
                                <option value="Farm">Farm</option>
                                <option value="Energy">Energy</option>
                                <option value="Oil">Oil</option>
                                {{-- add manually for the options --}}
                            </select>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Account Type</p>
                            <select id="userType" name="userType"
                                class="form-select  mb-3 h-[68px] appearance-none block w-full px-4 py-2 text-heading6 font-normal text-green-100 bg-green-900 bg-clip-padding bg-no-repeat border-solid border-lime-300 border-2 rounded-[12px] transition ease-in-out m-0 focus:text-green-700 focus:bg-lime-300 focus:border-lime-500 focus:outline-none">
                                <option selected>{{ $user->userType }}</option>
                                <option value="Supplier">Supplier</option>
                                <option value="Business Owner">Business Owner</option>
                                <option value="Personal">Personal</option>
                                {{-- add manually for the options --}}
                            </select>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Gender</p>
                            <select id="gender" name="gender"
                                class="form-select  mb-3 h-[68px] appearance-none block w-full px-4 py-2 text-heading6 font-normal text-green-100 bg-green-900 bg-clip-padding bg-no-repeat border-solid border-lime-300 border-2 rounded-[12px] transition ease-in-out m-0 focus:text-green-700 focus:bg-lime-300 focus:border-lime-500 focus:outline-none">
                                <option selected>{{ $user->gender }}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                {{-- add manually for the options --}}
                            </select>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">DOB</p>
                            <x-inputDetail type="date" id="dob" name="dob" value="{{ $user->dob }}">
                            </x-inputDetail>
                        </div>
                        <div class="mb-4">
                            <p class="text-green-100 text-heading5 font-semibold mb-2">Country</p>
                            <x-inputDetail type="text" name="country" id="country" value="{{ $user->country }}">
                            </x-inputDetail>
                        </div>

                        <x-button>Save Changes</x-button>
                    </form>
                </div>
            </div>

            <div id="profileBackground" class="hidden">
                <div>
                    <p class="text-heading2 text-green-100 font-semibold">Account</p>
                    <p class="text-heading3 text-lime-300 font-semibold">Edit Profile</p>
                </div>
                <div class="text-lime-300">
                    profile background
                </div>
            </div>

            <div id="changePassword" class="hidden">
                <div>
                    <p class="text-heading2 text-green-100 font-semibold">Account</p>
                    <p class="text-heading3 text-lime-300 font-semibold">Edit Profile</p>
                </div>
                <div class="text-lime-300">
                    change password
                </div>
            </div>
        </div>
    </div>
    <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <x-button>Log out</x-button>
        </form>
    </div>

</x-app-layout>



<script>
    import Datepicker from '@themesberg/tailwind-datepicker/Datepicker';
</script>
<script>
    function yourProfile() {
        var yourProfile = document.getElementById("yourProfile");
        var btn_yourProfile = document.getElementById("btn-yourProfile");

        var editProfile = document.getElementById("editProfile");
        var btn_editProfile = document.getElementById("btn-editProfile");

        var profileBackground = document.getElementById("profileBackground");
        var btn_profileBackground = document.getElementById("btn-profileBackground");

        var changePassword = document.getElementById("changePassword");
        var btn_changePassword = document.getElementById("btn-changePassword");


        if (yourProfile.style.display != "block") {
            editProfile.style.display = "none";
            profileBackground.style.display = "none";
            changePassword.style.display = "none";
            yourProfile.style.display = "block";

            btn_yourProfile.style.backgroundColor = "rgb(152 245 118)";
            btn_yourProfile.style.color = "rgb(69,114,99)";
            btn_yourProfile.border = "none";

            btn_editProfile.style.backgroundColor = "transparent";
            btn_editProfile.style.color = "rgb(152 245 118)";
            btn_editProfile.border = "2px solid #98F576";

            btn_profileBackground.style.backgroundColor = "transparent";
            btn_profileBackground.style.color = "rgb(152 245 118)";
            btn_profileBackground.border = "2px solid #98F576";

            btn_changePassword.style.backgroundColor = "transparent";
            btn_changePassword.style.color = "rgb(152 245 118)";
            btn_changePassword.border = "2px solid #98F576";
        }
    }

    function editProfile() {
        var yourProfile = document.getElementById("yourProfile");
        var btn_yourProfile = document.getElementById("btn-yourProfile");

        var editProfile = document.getElementById("editProfile");
        var btn_editProfile = document.getElementById("btn-editProfile");

        var profileBackground = document.getElementById("profileBackground");
        var btn_profileBackground = document.getElementById("btn-profileBackground");

        var changePassword = document.getElementById("changePassword");
        var btn_changePassword = document.getElementById("btn-changePassword");


        if (editProfile.style.display != "block") {
            yourProfile.style.display = "none";
            profileBackground.style.display = "none";
            changePassword.style.display = "none";
            editProfile.style.display = "block";

            btn_yourProfile.style.backgroundColor = "transparent";
            btn_yourProfile.style.color = "rgb(152 245 118)";

            btn_editProfile.style.backgroundColor = "rgb(152 245 118)";
            btn_editProfile.style.color = "rgb(69 114 99)";

            btn_profileBackground.style.backgroundColor = "transparent";
            btn_profileBackground.style.color = "rgb(152 245 118)";
            btn_profileBackground.border = "2px solid #98F576";

            btn_changePassword.style.backgroundColor = "transparent";
            btn_changePassword.style.color = "rgb(152 245 118)";
            btn_changePassword.border = "2px solid #98F576";
        }
    }

    function profileBackground() {
        var yourProfile = document.getElementById("yourProfile");
        var btn_yourProfile = document.getElementById("btn-yourProfile");

        var editProfile = document.getElementById("editProfile");
        var btn_editProfile = document.getElementById("btn-editProfile");

        var profileBackground = document.getElementById("profileBackground");
        var btn_profileBackground = document.getElementById("btn-profileBackground");

        var changePassword = document.getElementById("changePassword");
        var btn_changePassword = document.getElementById("btn-changePassword");


        if (profileBackground.style.display != "block") {
            yourProfile.style.display = "none";
            changePassword.style.display = "none";
            editProfile.style.display = "none";
            profileBackground.style.display = "block";

            btn_yourProfile.style.backgroundColor = "transparent";
            btn_yourProfile.style.color = "rgb(152 245 118)";
            btn_yourProfile.border = "2px solid #98F576";

            btn_editProfile.style.backgroundColor = "transparent";
            btn_editProfile.style.color = "rgb(152 245 118)";
            btn_editProfile.border = "2px solid #98F576";

            btn_profileBackground.style.backgroundColor = "rgb(152 245 118)";
            btn_profileBackground.style.color = "rgb(69 114 99)";
            btn_profileBackground.border = "2px solid #98F576";

            btn_changePassword.style.backgroundColor = "transparent";
            btn_changePassword.style.color = "rgb(152 245 118)";
            btn_changePassword.border = "2px solid #98F576";
        }
    }

    function changePassword() {
        var yourProfile = document.getElementById("yourProfile");
        var btn_yourProfile = document.getElementById("btn-yourProfile");

        var editProfile = document.getElementById("editProfile");
        var btn_editProfile = document.getElementById("btn-editProfile");

        var profileBackground = document.getElementById("profileBackground");
        var btn_profileBackground = document.getElementById("btn-profileBackground");

        var changePassword = document.getElementById("changePassword");
        var btn_changePassword = document.getElementById("btn-changePassword");


        if (changePassword.style.display === "none") {
            yourProfile.style.display = "none";
            profileBackground.style.display = "none";
            editProfile.style.display = "none";
            changePassword.style.display = "block";

            btn_yourProfile.style.backgroundColor = "transparent";
            btn_yourProfile.style.color = "rgb(152 245 118)";
            btn_yourProfile.border = "none";

            btn_editProfile.style.backgroundColor = "transparent";
            btn_editProfile.style.color = "rgb(152 245 118)";
            btn_editProfile.border = "2px solid #98F576";

            btn_profileBackground.style.backgroundColor = "transparent";
            btn_profileBackground.style.color = "rgb(152 245 118)";
            btn_profileBackground.border = "2px solid #98F576";

            btn_changePassword.style.backgroundColor = "rgb(152 245 118)";
            btn_changePassword.style.color = "rgb(69 114 99)";
            btn_changePassword.border = "2px solid #98F576";
        }
    }
</script>
