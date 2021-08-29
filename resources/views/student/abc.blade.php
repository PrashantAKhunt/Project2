            

            

            

            

            <!--Mother Name -->
            <div>
                <x-label for="mother name" :value="__('Mother Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="mother_name" :value="old('name')" required autofocus />
            </div>

            <!--Mother Occupation -->
            <div>
                <x-label for="mother Occupation" :value="__('Mother Occupation')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="mother_occupation" :value="old('name')" required autofocus />
            </div>

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

            <!-- Address -->
            <div>
                <x-label for="address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus ></textarea>
            </div>

            <!-- Address as per Aadhar -->
            <div>
                <x-label for="Address as per Aadhar" :value="__('Address as per Aadhar card')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address_aadhar" required autofocus ></textarea>
            </div>

            <!-- pin code -->
            <div>
                <x-label for="pin code" :value="__('PIN Code')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="pincode" required autofocus />
            </div>

            <!--Tehasil/Block -->
            <div>
                <x-label for="Tehasil" :value="__('Tehasil/Block')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="tehasil" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <br>

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
                <x-label for="address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus ></textarea>
            </div>
