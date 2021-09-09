<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Receptionist') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    
        
        
        <form method="POST" action="/{{Auth::user()->roles[0]['name']}}/editReceptionist/" enctype="multipart/form-data">
        @csrf
            <!-- Name -->
            <input type="hidden" name="id" value="{{$receptionist->id}}"/>
            <input type="hidden" name="Oemail" value="{{$receptionist->email}}"/>
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $receptionist->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $receptionist->email}}" required />
            </div>
            <br>
            

            <!-- select branch -->
            <div>
            
                <x-label for="Select Branch" :value="__('Select Branch')" />
                <select class="form-select" aria-label="Default select example" name="branch_id" >
                    
                        @foreach($branches as $branch)
                            @if(($receptionist->branch_id)==$branch->id)
                            <option value="{{$branch->id}}" selected>{{$branch->name}}</option>
                            @else
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
            <br>

            <!-- Profile Photo -->
            <div>
            <img style="width: 100px; hight: 100px;" src="{{$receptionist->profile_photo}}" alt="..." class="img-thumbnail">
                <x-label for="Profile Photo" :value="__('Profile Photo')" />
                <input type="file" name="photo"/>
            </div>
            <br>
            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" value="{{ $receptionist->contact_no}}" required autofocus />
            </div>
            <br>
            <!-- Aadhar Number -->
            <div>
                <x-label for="Aadhar number" :value="__('Aadhar number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="aadhar_number" value="{{ $receptionist->aadhar_no}}" required autofocus />
            </div>
            <br>
            <!-- Qualification -->
            <div>
                <x-label for="Qualification" :value="__('Qualification')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="qualification" value="{{ $receptionist->qualification}}" required autofocus />
            </div>
            <br>
            <!-- Address -->
            <div>
                <x-label for="Address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus >{{ $receptionist->address}}</textarea>
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
                    {{ __('Update Receptionist') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
