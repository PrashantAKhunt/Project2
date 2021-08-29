<?php

namespace App\Exports;
use App\Models\Manager;
use Maatwebsite\Excel\Concerns\FromCollection;

class ManagerExport implements FromCollection
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
        return Manager::where('branch_id',$this->id)->get();
    }
}
