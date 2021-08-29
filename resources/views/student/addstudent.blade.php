<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if(Auth::user()->hasRole('admin'))
        <form method="POST" action="{{ route('student.admin.register') }}" enctype="multipart/form-data">
        @elseif(Auth::user()->hasRole('manager'))
        <form method="POST" action="{{ route('student.manager.register') }}" enctype="multipart/form-data">
        @elseif(Auth::user()->hasRole('employee'))
        <form method="POST" action="{{ route('student.employee.register') }}" enctype="multipart/form-data">
        @elseif(Auth::user()->hasRole('branch'))
        <form method="POST" action="{{ route('student.branch.register') }}" enctype="multipart/form-data">
        @endif
            @csrf

            <!--Enroll For -->
            <div>
                <x-label for="Enroll for" :value="__('Enroll For')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="enroll_for"  required autofocus />
            </div>
            <br>
            <!--First Name -->
            <div>
                <x-label for="first name" :value="__('First Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="first_name"  required autofocus />
            </div>
            <br>
            <!--Last Name -->
            <div>
                <x-label for="last name" :value="__('Last Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="last_name"  required autofocus />
            </div>
            <br>
            <!--Father Name -->
            <div>
                <x-label for="father name" :value="__('Father Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="father_name"  required autofocus />
            </div>
            <br>
            <!--Father Occupation -->
            <div>
                <x-label for="father Occupation" :value="__('Father Occupation')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="father_occupation"  required autofocus />
            </div>
            <br>

            <!--Mother Name -->
            <div>
                <x-label for="mother name" :value="__('Mother Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="mother_name"  required autofocus />
            </div>
            <br>
            <!--Mother Occupation -->
            <div>
                <x-label for="mother Occupation" :value="__('Mother Occupation')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="mother_occupation"  required autofocus />
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
            <!-- Address -->
            <div>
                <x-label for="address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus ></textarea>
            </div>
            <br>
            <!-- Address as per Aadhar -->
            <div>
                <x-label for="Address as per Aadhar" :value="__('Address as per Aadhar card')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address_aadhar" required autofocus ></textarea>
            </div>
            <br>
            <!-- pin code -->
            <div>
                <x-label for="pin code" :value="__('PIN Code')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="pincode" required autofocus />
            </div>
            <br>
            <!--Tehasil/Block -->
            <div>
                <x-label for="Tehasil" :value="__('Tehasil/Block')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="tehasil"  required autofocus />
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            

            <!-- Date of Birth -->
            <div class="mt-4">
                <x-label for="birth date" :value="__('Birth Date')" />
                <input type="date" id="birthday" name="dob" required />
            </div>
            <br>

            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" required autofocus />
            </div>
            <br>

            <!--Cast -->
            <div>
                <x-label for="cast" :value="__('cast')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="cast"  required autofocus />
            </div>
            <br>

            <!-- Categories -->
            <div>
                <x-label for="categories" :value="__('Categories')" />
                <x-input id="categories" class="block mt-1 w-full" type="text" name="categories"  required autofocus />
            </div>
            <br>

            <!-- place of birth -->
            <div>
                <x-label for="place of birth" :value="__('Place of Birth')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="birth_place"  required autofocus />
            </div>
            <br>

            <!--Any Disability -->
            <div>
                <x-label for="Any Disability" :value="__('Any Disability')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="disability"  required autofocus />
            </div>
            <br>
      
            <!-- Aadhar Number -->
            <div>
                <x-label for="Aadhar number" :value="__('Aadhar number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="aadhar_number" required autofocus />
            </div>
            <br>

            <!--Documents Proof -->
            <div>
                <x-label for="Document Proof" :value="__('Document Proof')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="document_proof" required autofocus />
            </div>
            <br>

            <!-- Bank Account holder name -->
            <div>
                <x-label for="Account holder name" :value="__('Bank Account Holder Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="account_name"  required autofocus />
            </div>
            <br>

             <!-- Bank name -->
             <div>
                <x-label for="Bank Name" :value="__('Bank Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="bank_name"  required autofocus />
            </div>
            <br>

            <!-- Branch name -->
            <div>
                <x-label for="Branch Name" :value="__('Branch Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="bank_branch"  required autofocus />
            </div>
            <br>

            <!--Account No -->
            <div>
                <x-label for="Account Number" :value="__('Account Number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="account_number" required autofocus />
            </div>
            <br>

            <!-- IFSC code. -->
            <div>
                <x-label for="IFSC Code" :value="__('IFSC Code')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="ifsc_code"  required autofocus />
            </div>
            
                                    
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <br>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Add Student') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
