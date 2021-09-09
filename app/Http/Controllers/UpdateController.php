<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class UpdateController extends Controller
{
    public $branches="";
    
    public function getBranch()
    {
        $branches;
        if(Auth::user()->hasRole('admin'))
             $branches = Branch::all();
        else
        {
            $id = Auth::user()->branch_id;
            $branches = Branch::where('id',$id)->get();
        }
        return $branches;
    }
    public function editTrainer($id)
    {
        $trainer = Trainer::find($id);
        $branches = $this->getBranch();
        return view('update.editTrainer',compact(['trainer','branches']));
    }

    public function editCounsellor($id)
    {
        $counsellor = Counsellor::find($id);
        $branches = $this->getBranch();
        return view('update.editCounsellor',compact(['counsellor','branches']));
    }

    public function editReceptionist($id)
    {
        $receptionist = Receptionist::find($id);
        $branches = $this->getBranch();
        return view('update.editReceptionist',compact(['receptionist','branches']));
    }

    public function editMobiliser($id)
    {
        $mobiliser = Mobiliser::find($id);
        $branches = $this->getBranch();
        return view('update.editMobiliser',compact(['mobiliser','branches']));
    }

    public function editPeon($id)
    {
        $peon = Peon::find($id);
        $branches = $this->getBranch();
        return view('update.editPeon',compact(['peon','branches']));
    }

    public function editStudent($id)
    {
        $student = Student::find($id);
        $branches = $this->getBranch();
        return view('student.editStudent',compact(['student','branches']));
    }

    public function editManager($id)
    {
        $manager = Manager::find($id);
        $branches = $this->getBranch();
        return view('branch.editManager',compact(['manager','branches']));
    }

    public function editBranch($id)
    {
        $branch = Branch::find($id);
       // $branches = $this->getBranch();
        return view('branch.editBranch',compact(['branch']));
    }





    //Trainer
    public function updateTrainer(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            //'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'enroll_for' => 'required|string|max:255',
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $trainer = Trainer::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $trainer = Trainer::where('id',$id)->update([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'enroll_for'=>$request->enroll_for,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteTrainer($id)
    {
        $email = Trainer::where('id',$id)->get('email');
        Trainer::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }



    // Counsellor
    
    public function updateCounsellor(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            //'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $counsellor = Counsellor::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $counsellor = Counsellor::where('id',$id)->update([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteCounsellor($id)
    {
        $email = Counsellor::where('id',$id)->get('email');
        Counsellor::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }

    //Receptionist    
    public function updateReceptionist(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            //'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $receptionist = Receptionist::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $receptionist = Receptionist::where('id',$id)->update([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteReceptionist($id)
    {
        $email = Receptionist::where('id',$id)->get('email');
        Receptionist::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }

    //Mobiliser    
    public function updateMobiliser(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            //'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $mobiliser = Mobiliser::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $Mobiliser = Mobiliser::where('id',$id)->update([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>3,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteMobiliser($id)
    {
        $email = Mobiliser::where('id',$id)->get('email');
        Mobiliser::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }

    //Peon    
    public function updatePeon(Request $request)
    {
        $request->validate([
           // 'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|digits:10',
            'branch_id' => 'required',
            'aadhar_number' => 'required|digits:12',
            'address' => 'required|string',
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $peon = Peon::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $Peon = Peon::where('id',$id)->update([
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

    public function deletePeon($id)
    {
        Peon::destroy($id);
        return redirect()->route('dashboard');
    }

    //student
    public function updateStudent(Request $request)
    {
        $request->validate([
            
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
            'email'=> 'required|string|email|max:255',
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

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $student = Student::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $student = Student::where('id',$id)->update([
            'branch_id'=> $request->branch_id,
            'role_id'=> 4,
            'enrollfor'=> $request->enroll_for,
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
        ]);        
        
        return redirect()->route('dashboard');
    }

    public function deleteStudent($id)
    {
        Student::destroy($id);
        return redirect()->route('dashboard');
    }


    //Manager
    public function updateManager(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            //'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'enroll_for' => 'required|string|max:255',
            'contact_number' => 'required|digits:10',
            'aadhar_number' => 'required|digits:12',
            'branch_id'=>'required',
            'qualification' => 'required|string|max:255',
            'address' => 'required|string',
            
        ]);

        $id=$request->id;
        if($request->photo)
        {
            $request->validate([
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            $uploadedFileUrl = cloudinary()->upload($request->file('photo')->getRealPath(),[
                'folder'=>'Testing',
            ])->getSecurePath();

            $manager = Manager::where('id',$id)->update([
                'profile_photo'=>$uploadedFileUrl,
            ]);
        }

        
        
        $manager = Manager::where('id',$id)->update([
            'name' => $request->name,
            'branch_id'=>$request->branch_id,
            'role_id'=>2,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'aadhar_no'=>$request->aadhar_number,
            //'profile_photo'=>$uploadedFileUrl,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'branch_id'=>$request->branch_id,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteManager($id)
    {
        $email = Manager::where('id',$id)->get('email');
        Manager::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }


    //Branch
    public function updateBranch(Request $request)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_number' => 'required|digits:10',
            'address' => 'required|string',
            'admin_name' => 'required|string|max:255',
            
        ]);

        $id=$request->id;
        
        $branch = Branch::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact_no'=>$request->contact_number,
            'address'=>$request->address,
            'admin_name'=>$request->admin_name,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email',$request->Oemail)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('dashboard');
    }

    public function deleteBranch($id)
    {
        $email = Branch::where('id',$id)->get('email');
        Branch::destroy($id);
        $user = User::where('email',$email[0]['email'])->delete();
         return redirect()->route('dashboard');
    }


    
}
