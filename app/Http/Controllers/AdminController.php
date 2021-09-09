<?php

namespace App\Http\Controllers;
Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
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
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // add
    public function addtrainer()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }
        
        return view('employee.addtrainer',compact(['branches']));   
    }

    public function addcounsellor()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }
        return view('employee.addcounsellor',compact(['branches']));   
    }
    
    public function addmobiliser()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }
        return view('employee.addmobiliser',compact(['branches']));   
    }

    public function addreceptionist()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }

        return view('employee.addreceptionist',compact(['branches']));   
    }

    public function addpeon()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }

        return view('employee.addpeon',compact(['branches']));   
    }

    public function addbranch()
    {
        return view('branch.addbranch');   
    }

    public function addstudent()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }else if(Auth::user()->hasRole('manager'))
        {
            $managers = Manager::where('email',Auth::user()->email)->get();
            $id="";
            foreach($managers as $manager)
            {
                $id = $manager->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }else if(Auth::user()->hasRole('employee'))
        {
            $emplyes = User::where('email',Auth::user()->email)->get();
            $id="";
            foreach($emplyes as $emplyee)
            {
                $id = $emplyee->branch_id;
            }
            $branches = Branch::where('id',$id)->get();
        }
        else{
            $branches = Branch::all();
        }


        return view('student.addstudent',compact(['branches']));   
    }

    public function addmanager()
    {
        $branches=[];
        if(Auth::user()->hasRole('branch'))
        {
            $branches = Branch::where('email',Auth::user()->email)->get();
        }
        else{
            $branches = Branch::all();
        }
        return view('branch.addmanager',compact(['branches']));   
    }


    // store
    public function storetrainer(Request $request)
    {
        //dd($request->branch_id);
        $request->validate([
            
            'name' => 'required|string|max:255',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'enroll_for' => 'required|string|max:255',
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();
        $trainer = Trainer::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'enroll_for'=>$request->enroll_for,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        $user->attachRole(3);
        return redirect()->route('dashboard');   
    }

    public function storecounsellor(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $counsellor = Counsellor::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
      
        $user->attachRole(3);
        return redirect()->route('dashboard');   
    }

    public function storemobiliser(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'branch_id'=>'required',
            'aadhar_number' => 'required|digits:12',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $mobiliser = Mobiliser::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
      
        $user->attachRole(3);
        return redirect()->route('dashboard');  
    }

    public function storereceptionist(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $receptionist = Receptionist::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
      
        $user->attachRole(3);
        return redirect()->route('dashboard');   
    }

    public function storepeon(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|digits:10',
            'branch_id' => 'required',
            'aadhar_number' => 'required|digits:12',
            'address' => 'required|string',
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $peon = Peon::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
        ]);

        return redirect()->route('dashboard');   
    }

    public function storebranch(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'address' => 'required|string',
            'admin_name' => 'required|string|max:255',
        ]);

        $branch = Branch::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'address'=>$request->address,
            'admin_name'=>$request->admin_name,
            'password' => Hash::make($request->password),
        ])->id;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$branch,
            'password' => Hash::make($request->password),
        ]);
        
        $user->attachRole(5);
        return redirect()->route('dashboard');
    }

    public function storemanager(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $manager = Manager::create([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>2,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
      
        $user->attachRole(2);
        return redirect()->route('dashboard');
    }

    public function storestudent(Request $request)
    {
        $request->validate([
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'enroll_for'=> 'required|string|max:255',
            'first_name'=> 'required|string|max:255',
            'last_name'=> 'required|string|max:255',
            'father_name'=> 'required|string|max:255',
            'father_occupation'=> 'required|string|max:255',
            'mother_name'=> 'required|string|max:255',
            'mother_occupation'=> 'required|string|max:255',
            'address'=> 'required|string',
            'branch_id'=>'required',
            'address_aadhar'=> 'required|string',
            'pincode'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'tehasil'=> 'required|string|max:255',
            'dob'=> 'required|string|max:255',
            'contact_number' => 'required|digits:10',
            'cast'=> 'required|string|max:255',
            'categories'=> 'required|string|max:255',
            'birth_place'=> 'required|string|max:255',
            'disability'=> 'required|string|max:255',
            'aadhar_number' => 'required|digits:12',
            'document_proof'=> 'required|string|max:255',
            'account_name'=> 'required|string|max:255',
            'bank_name'=> 'required|string|max:255',
            'bank_branch'=> 'required|string|max:255',
            'account_number'=> 'required|string|max:255',
            'ifsc_code'=> 'required|string|max:255',
            
        ]);

        $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
            'folder'=>'Testing',
        ])->getSecurePath();

        $student = Student::create([

            'branch_id'=> $request->branch_id,
            'role_id'=> 4,
            'enrollfor'=> $request->enroll_for,
            'joining_date'=> Carbon::now(),
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'father_name'=> $request->father_name,
            'father_occupation'=> $request->father_occupation,
            'mother_name'=> $request->mother_name,
            'mother_occupation'=> $request->mother_occupation,
            'address'=> $request->address,
            'aadhar_address'=> $request->address_aadhar,
            'pincode'=> $request->pincode,
            'tehasil'=> $request->tehasil,
            'email'=> $request->email,
            'dob'=> $request->dob,
            'contact_no'=> $request->contact_number,
            'cast'=> $request->cast,
            'categories'=> $request->categories,
            'birth_place'=> $request->birth_place,
            'disability'=> $request->disability,
            'aadhar_no'=> $request->aadhar_number,
            'documents_proof'=> $request->document_proof,
            'account_name'=> $request->account_name,
            'bank_name'=> $request->bank_name,
            'bank_branch'=> $request->bank_branch,
            'account_number'=> $request->account_number,
            'ifsc_code'=> $request->ifsc_code,
            'profile_photo'=>$uploadedFileUrl,
        ]);

        return redirect()->route('dashboard');
    }

}
