<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trainer;
use App\Models\Counsellor;
use App\Models\Mobiliser;
use App\Models\Receptionist;
use App\Models\Student;
use App\Models\Peon;
use App\Models\Manager;

use App\Exports\CounsellorExport;
use App\Exports\ManagerExport;
use App\Exports\MobiliserExport;
use App\Exports\PeonExport;
use App\Exports\ReceptionistExport;
use App\Exports\StudentExport;
use App\Exports\TrainerExport;


use Maatwebsite\Excel\Facades\Excel;


class BranchController extends Controller
{
    //
    
    public function viewBranchDetails(Request $request)
    {
        $id = $request->id;

        $trainers = Trainer::where('branch_id',$id)->get();
        $counsellors = Counsellor::where('branch_id',$id)->get();
        $mobilisers = Mobiliser::where('branch_id',$id)->get();
        $receptionists = Receptionist::where('branch_id',$id)->get();
        $peons = Peon::where('branch_id',$id)->get();
        $managers = Manager::where('branch_id',$id)->get();
        $students = Student::where('branch_id',$id)->get();
        return view('branch.branchdetails',compact(['trainers','counsellors','mobilisers','receptionists','peons','managers','students','id']));
    }

    public function exportManager(Request $request)
    {
        $id=$request->id;
        return Excel::download(new ManagerExport($id), 'managers.xls');
    }

    public function exportTrainer(Request $request)
    {
        $id=$request->id;
        return Excel::download(new TrainerExport($id), 'trainers.xls');
    }

    public function exportCounsellor(Request $request)
    {
        $id=$request->id;
        return Excel::download(new CounsellorExport($id), 'counsellors.xls');
    }

    public function exportReceptionist(Request $request)
    {
        $id=$request->id;
        return Excel::download(new ReceptionistExport($id), 'receptionists.xls');
    }

    public function exportMobiliser(Request $request)
    {
        $id=$request->id;
        return Excel::download(new MobiliserExport($id), 'mobilisers.xls');
    }

    public function exportPeon(Request $request)
    {
        $id=$request->id;
        return Excel::download(new PeonExport($id), 'peons.xls');
    }

    public function exportStudent(Request $request)
    {
        $id=$request->id;
        return Excel::download(new StudentExport($id), 'students.xls');
    }


}
