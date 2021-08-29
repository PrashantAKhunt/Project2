<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">contact no</th>
                            <th scope="col">Admin name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($branches as $branch)        
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$branch->name}}</td>
                                <td>{{$branch->email}}</td>
                                <td>{{$branch->contact_no}}</td>
                                <td>{{$branch->admin_name}}</td>
                                <td>{{$branch->address}}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.viewbranch') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$branch->id}}" />
                                        <input type="submit" name="submit" value="view">
                                    </form>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
