<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Manager') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if(Auth::user()->hasRole('admin'))
        <form method="POST" action="{{ route('manager.admin.register') }}" enctype="multipart/form-data">
        @elseif(Auth::user()->hasRole('branch'))
        <form method="POST" action="{{ route('manager.branch.register') }}" enctype="multipart/form-data">
        @endif

            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <br>

            <!-- select branch -->
            <div>
                <x-label for="Select Branch" :value="__('Select Branch')" />
                <select class="form-select" aria-label="Default select example" name="branch_id">
                    <option selected>Open this select menu</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>    
                        @endforeach
                </select>
            </div>
            <br>

            <!-- Profile Photo -->
            <div>
                <x-label for="Profile Photo" :value="__('Profile Photo')" />
                <input type="file" name="photo" />
            </div>
            <br>

            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" required autofocus />
            </div>
            <br>
            <!-- Aadhar Number -->
            <div>
                <x-label for="Aadhar number" :value="__('Aadhar number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="aadhar_number" required autofocus />
            </div>
            <br>
            <!-- Qualification -->
            <div>
                <x-label for="Qualification" :value="__('Qualification')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="qualification" required autofocus />
            </div>
            <br>
            <!-- Address -->
            <div>
                <x-label for="Address" :value="__('Address')" />
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
                    {{ __('Add Manager') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
