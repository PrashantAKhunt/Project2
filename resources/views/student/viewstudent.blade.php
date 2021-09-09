<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Student Details') }}
                    </h2>
                    @foreach($students as $student)
                    <table class="table">
                        <tr>
                            <td>Photo</td>
                            <td><td><img style="width: 100px; hight: 100px;" src="{{$student->profile_photo}}" alt="..." class="img-thumbnail"></td></td>
                        </tr>
                        <tr>
                            <td>Enroll For</td>
                            <td>{{$student->enrollfor}}</td>
                        </tr>

                        <tr>
                            <td>First Name</td>
                            <td>{{$student->first_name}}</td>
                        </tr>

                        <tr>
                            <td>Last Name</td>
                            <td>{{$student->last_name}}</td>
                        </tr>

                        <tr>
                            <td>Father Name</td>
                            <td>{{$student->father_name}}</td>
                        </tr>

                        <tr>
                            <td>Father Occupation</td>
                            <td>{{$student->father_occupation}}</td>
                        </tr>

                        <tr>
                            <td>Mother Name</td>
                            <td>{{$student->mother_name}}</td>
                        </tr>

                        <tr>
                            <td>Mother Occupation</td>
                            <td>{{$student->mother_occupation}}</td>
                        </tr>

                        <tr>
                            <td>Address</td>
                            <td>{{$student->address}}</td>
                        </tr>

                        <tr>
                            <td>Address as per aadhar</td>
                            <td>{{$student->aadhar_address}}</td>
                        </tr>
                        
                        <tr>
                            <td>Pin code</td>
                            <td>{{$student->pincode}}</td>
                        </tr>

                        <tr>
                            <td>Tehasil</td>
                            <td>{{$student->tehasil}}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{$student->email}}</td>
                        </tr>

                        <tr>
                            <td>Date of birth</td>
                            <td>{{$student->dob}}</td>
                        </tr>

                        <tr>
                            <td>Mobile Number</td>
                            <td>{{$student->contact_no}}</td>
                        </tr>

                        <tr>
                            <td>Cast</td>
                            <td>{{$student->cast}}</td>
                        </tr>

                        <tr>
                            <td>Categories</td>
                            <td>{{$student->categories}}</td>
                        </tr>

                        <tr>
                            <td>Place of Birth</td>
                            <td>{{$student->birth_place}}</td>
                        </tr>

                        <tr>
                            <td>Any Disability</td>
                            <td>{{$student->disability}}</td>
                        </tr>

                        <tr>
                            <td>Aadhar number</td>
                            <td>{{$student->aadhar_no}}</td>
                        </tr>

                        <tr>
                            <td>Document Proof</td>
                            <td>{{$student->documents_proof}}</td>
                        </tr>

                        <tr>
                            <td>Bank Account Holder name</td>
                            <td>{{$student->account_name}}</td>
                        </tr>

                        <tr>
                            <td>Bank Name</td>
                            <td>{{$student->bank_name}}</td>
                        </tr>

                        <tr>
                            <td>Branch Name</td>
                            <td>{{$student->bank_branch}}</td>
                        </tr>

                        <tr>
                            <td>Account Number</td>
                            <td>{{$student->account_number}}</td>
                        </tr>

                        <tr>
                            <td>IFSC Code</td>
                            <td>{{$student->ifsc_code}}</td>
                        </tr>
                    </table>
                    @endforeach
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
