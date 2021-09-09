<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Branch') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="/{{Auth::user()->roles[0]['name']}}/editBranch/" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$branch->id}}"/>
            <input type="hidden" name="Oemail" value="{{$branch->email}}"/>
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$branch->name}}" required autofocus />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$branch->email}}" required />
            </div>
            <br>

            
            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" value="{{$branch->contact_no}}" required autofocus />
            </div>
            <br>

            <!--Admin Name -->
            <div>
                <x-label for="admin_name" :value="__('Admin Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="admin_name" value="{{$branch->admin_name}}" required autofocus />
            </div>
            <br>
            
            <!-- Address -->
            <div>
                <x-label for="Address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus >{{$branch->address}}</textarea>
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
                    {{ __('Update Branch') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
