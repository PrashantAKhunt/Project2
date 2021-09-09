<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                

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
                                <td><a href="/{{Auth::user()->roles[0]['name']}}/editStudent/{{$student->id}}">Edit</a></td>
                                
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
