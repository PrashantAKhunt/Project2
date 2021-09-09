<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Branch') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('branch.admin.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__(' Branch Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <br>
            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" required autofocus />
            </div>
            <br>
            <!--Admin Name -->
            <div>
                <x-label for="name" :value="__(' Admin Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="admin_name" :value="old('name')" required autofocus />
            </div>
            <br>
            <!-- Address -->
            <div>
                <x-label for="Qualification" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus ></textarea>
            </div>
            
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <span>
                    <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"> </i>
                </span>
                <script>
                    var state=true;
                    function toggle(){
                        if(state){
                            document.getElementById("password")
                            .setAttribute("type","text");
                            state=false;
                        }
                        else{
                            document.getElementById("password")
                            .setAttribute("type","password");
                            state=true;
                        }
                    }
                </script>
            </div>
            <br>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                <span>
                    <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle1()"> </i>
                </span>
                <script>
                    var state=true;
                    function toggle1(){
                        if(state){
                            document.getElementById("password_confirmation")
                            .setAttribute("type","text");
                            state=false;
                        }
                        else{
                            document.getElementById("password_confirmation")
                            .setAttribute("type","password");
                            state=true;
                        }
                    }
                </script>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Add Branch') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
