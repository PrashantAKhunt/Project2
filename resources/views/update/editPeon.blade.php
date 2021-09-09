<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Peon') }}
        </h2>
    </x-slot>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    
        
        
        <form method="POST" action="/{{Auth::user()->roles[0]['name']}}/editPeon/" enctype="multipart/form-data">
        @csrf
            <!-- Name -->
            <input type="hidden" name="id" value="{{$peon->id}}"/>
            <input type="hidden" name="Oemail" value="{{$peon->email}}"/>
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $peon->name}}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $peon->email}}" required />
            </div>
            <br>
            

            <!-- select branch -->
            <div>
            
                <x-label for="Select Branch" :value="__('Select Branch')" />
                <select class="form-select" aria-label="Default select example" name="branch_id" >
                    
                        @foreach($branches as $branch)
                            @if(($peon->branch_id)==$branch->id)
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
            <img style="width: 100px; hight: 100px;" src="{{$peon->profile_photo}}" alt="..." class="img-thumbnail">
                <x-label for="Profile Photo" :value="__('Profile Photo')" />
                <input type="file" name="photo"/>
            </div>
            <br>
            <!-- contact number -->
            <div>
                <x-label for="Contact number" :value="__('Contact number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="contact_number" value="{{ $peon->contact_no}}" required autofocus />
            </div>
            <br>
            <!-- Aadhar Number -->
            <div>
                <x-label for="Aadhar number" :value="__('Aadhar number')" />
                <x-input id="name" class="block mt-1 w-full" type="number" name="aadhar_number" value="{{ $peon->aadhar_no}}" required autofocus />
            </div>
            <br>
            
            <!-- Address -->
            <div>
                <x-label for="Address" :value="__('Address')" />
                <textarea id="name" class="block mt-1 w-full" type="textarea" name="address" required autofocus >{{ $peon->address}}</textarea>
            </div>
            <br>
            
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update Peon') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
