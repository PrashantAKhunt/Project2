<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Trainer') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    
        
        
        <form method="POST" action="/{{Auth::user()->roles[0]['name']}}/editTrainer/" enctype="multipart/form-data">
        @csrf
            <!-- Name -->
            <input type="hidden" name="id" value="{{$trainer->id}}"/>
            <input type="hidden" name="Oemail" value="{{$trainer->email}}"/>
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $trainer->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $trainer->email}}" required />
            </div>
            <br>
            <!-- Enroll for -->
            <div>
                <x-label for="Enroll for" :value="__('Enroll for')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="enroll_for" value="{{ $trainer->enroll_for}}" required autofocus />
            </div>
            <br>

            <!-- select branch -->
            <div>
            
                <x-label for="Select Branch" :value="__('Select Branch')" />
                <select class="form-select" aria-label="Default select example" name="branch_id" >
                    
                        @foreach($branches as $branch)
                            @if(($trainer->branch_id)==$branch->id)
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
            <img style="width: 100px; hight: 100px;" src="{{$trainer->profile_photo}}" alt="..." class="img-thumbnail">
                <x-label for="Profile Photo" :value="__('Profile Photo')" />
                <input type="file" name="photo"/>
            </div>
            <br>
            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" value="{{ $trainer->contact_no}}" required autofocus />
            </div>
            <br>
            <!-- Aadhar Number -->
            <div>
                <x-label for="Aadhar number" :value="__('Aadhar number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="aadhar_number" value="{{ $trainer->aadhar_no}}" required autofocus />
            </div>
            <br>
            <!-- Qualification -->
            <div>
                <x-label for="Qualification" :value="__('Qualification')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="qualification" value="{{ $trainer->qualification}}" required autofocus />
            </div>
            <br>
            <!-- Address -->
            <div>
                <x-label for="Address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus >{{ $trainer->address}}</textarea>
            </div>
            <br>
            
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
                    {{ __('Update Trainer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
