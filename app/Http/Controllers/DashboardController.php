<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Trainer;
use App\Models\User;
use App\Models\Counsellor;
use App\Models\Manager;
use App\Models\Receptionist;
use App\Models\Peon;
use App\Models\Branch;
use App\Models\Admin;
use App\Models\Mobiliser;
use App\Models\Student;

use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            $branches = Branch::all();
            return view('admindashboard',compact(['branches']));
        }elseif(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            
            //$id = DB::table('branches')->select('id')->where('email',Auth::user()->email)->get();
            //dd($id);
            $trainers = Trainer::where('branch_id','=',$id)->get();
            $counsellors = Counsellor::where('branch_id','=',$id)->get();
            $mobilisers = Mobiliser::where('branch_id','=',$id)->get();
            $receptionists = Receptionist::where('branch_id','=',$id)->get();
            $peons = Peon::where('branch_id','=',$id)->get();
            $managers = Manager::where('branch_id','=',$id)->get();
            $students = Student::where('branch_id','=',$id)->get();
            //dd($trainers);
            return view('branch.branchdetails',compact(['trainers','counsellors','mobilisers','receptionists','peons','managers','students','id']));
            //return view('managerdashboard');
        }elseif(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get('id');
            $id="";
            foreach($branches as $branch)
            {
                $id = $branch->id;
            }
            
            //$id = DB::table('branches')->select('id')->where('email',Auth::user()->email)->get();
            //dd($id);
            $trainers = Trainer::where('branch_id','=',$id)->get();
            $counsellors = Counsellor::where('branch_id','=',$id)->get();
            $mobilisers = Mobiliser::where('branch_id','=',$id)->get();
            $receptionists = Receptionist::where('branch_id','=',$id)->get();
            $peons = Peon::where('branch_id','=',$id)->get();
            $managers = Manager::where('branch_id','=',$id)->get();
            $students = Student::where('branch_id','=',$id)->get();
            //dd($trainers);
            return view('branch.branchdetails',compact(['trainers','counsellors','mobilisers','receptionists','peons','managers','students','id']));
        //    return view('branchdashboard');
        }elseif(Auth::user()->hasRole('employee'))
        {

            $users = User::where('email',Auth::user()->email)->get('branch_id');
            $id="";
            foreach($users as $user)
            {
                $id = $user->branch_id;
            }

            $trainers = Trainer::where('branch_id','=',$id)->get();
            $counsellors = Counsellor::where('branch_id','=',$id)->get();
            $mobilisers = Mobiliser::where('branch_id','=',$id)->get();
            $receptionists = Receptionist::where('branch_id','=',$id)->get();
            $peons = Peon::where('branch_id','=',$id)->get();
            $managers = Manager::where('branch_id','=',$id)->get();
            $students = Student::where('branch_id','=',$id)->get();
            return view('branch.branchdetails',compact(['trainers','counsellors','mobilisers','receptionists','peons','managers','students','id']));
        }elseif(Auth::user()->hasRole('student'))
        {
            
            return redirect()->route('studentProfile');
        }

    }

    public function myprofile()
    {
        return view('myprofile');   
    }

    
    public function addemployee()
    {
        return view('employee.addtrainer');   
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
