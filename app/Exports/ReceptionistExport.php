<?php

namespace App\Exports;
use App\Models\Reception;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReceptionistExport implements FromCollection
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
        return Reception::where('branch_id',$this->id)->get();
    }
}
