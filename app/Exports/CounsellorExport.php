<?php

namespace App\Exports;
use App\Models\Counsellor;
use Maatwebsite\Excel\Concerns\FromCollection;

class CounsellorExport implements FromCollection
{
    public $id="";

    function __construct($id) {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Counsellor::where('branch_id',$this->id)->get();
    }
}
