<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Branch Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Manager Details') }}
                </h2>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.manager') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Manager">
                    </form>                   
                </h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($managers as $manager)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$manager->name}}</td>
                                <td>{{$manager->email}}</td>
                                <td>{{$manager->contact_no}}</td>
                                <td>{{$manager->aadhar_no}}</td>
                                <td>{{$manager->qualification}}</td>
                                <td>{{$manager->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$manager->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Trainer Details') }}
                </h2>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.trainer') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Trainer">
                    </form>                   
                </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Enroll for</th>
                            <th scope="col">contact no.</th>
                            <th scope="col">Aadhar no</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Address</th>
                            <th scope="col">Profile Photo</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($trainers as $trainer)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$trainer->name}}</td>
                                <td>{{$trainer->email}}</td>
                                <td>{{$trainer->enroll_for}}</td>
                                <td>{{$trainer->contact_no}}</td>
                                <td>{{$trainer->aadhar_no}}</td>
                                <td>{{$trainer->qualification}}</td>
                                <td>{{$trainer->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$trainer->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Counsellor Details') }}
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.counsellor') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Counsellor">
                    </form>                   
                    </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($counsellors as $counsellor)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$counsellor->name}}</td>
                                <td>{{$counsellor->email}}</td>
                                <td>{{$counsellor->contact_no}}</td>
                                <td>{{$counsellor->aadhar_no}}</td>
                                <td>{{$counsellor->qualification}}</td>
                                <td>{{$counsellor->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$counsellor->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Mobiliser Details') }}
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.mobiliser') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Mobiliser">
                    </form>                   
                    </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($mobilisers as $mobiliser)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$mobiliser->name}}</td>
                                <td>{{$mobiliser->email}}</td>
                                <td>{{$mobiliser->contact_no}}</td>
                                <td>{{$mobiliser->aadhar_no}}</td>
                                <td>{{$mobiliser->qualification}}</td>
                                <td>{{$mobiliser->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$mobiliser->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Receptionist Details') }}
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.receptionist') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Receptionist">
                    </form>                   
                    </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($receptionists as $receptionist)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$receptionist->name}}</td>
                                <td>{{$receptionist->email}}</td>
                                <td>{{$receptionist->contact_no}}</td>
                                <td>{{$receptionist->aadhar_no}}</td>
                                <td>{{$receptionist->qualification}}</td>
                                <td>{{$receptionist->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$receptionist->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Peon Details') }}
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.peon') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Peon">
                    </form>                   
                    </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($peons as $peon)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$peon->name}}</td>
                                <td>{{$peon->email}}</td>
                                <td>{{$peon->contact_no}}</td>
                                <td>{{$peon->aadhar_no}}</td>
                                <td>{{$peon->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$peon->profile_photo}}" alt="..." class="img-thumbnail"></td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Student Details') }}
                    </h2>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <form method="POST" action="{{ route('export.student') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}" />
                        <input type="submit" name="submit" value="Export Student">
                    </form>                   
                    </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">contact no.</th>
                                <th scope="col">Aadhar no</th>
                                <th scope="col">Address</th>
                                <th scope="col">Profile Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a=1; ?>
                            @foreach($students as $student)        
                            <tr>
                                <th scope="row"><?php echo $a++; ?></th>
                                <td>{{$student->first_name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->contact_no}}</td>
                                <td>{{$student->aadhar_no}}</td>
                                <td>{{$student->address}}</td>
                                <td><img style="width: 100px; hight: 100px;" src="{{$student->profile_photo}}" alt="..." class="img-thumbnail"></td>
                                <td>
                                    <form method="POST" action="{{ route('viewstudent') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$student->id}}" />
                                        <input type="submit" name="submit" value="view">
                                    </form>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <br><br>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
