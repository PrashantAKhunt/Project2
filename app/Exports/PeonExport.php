<?php

namespace App\Exports;
use App\Models\Peon;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeonExport implements FromCollection
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
        return Peon::where('branch_id',$this->id)->get();
    }
}
