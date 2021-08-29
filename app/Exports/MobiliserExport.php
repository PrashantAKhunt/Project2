<?php

namespace App\Exports;
use App\Models\Mobiliser;
use Maatwebsite\Excel\Concerns\FromCollection;

class MobiliserExport implements FromCollection
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
        return Mobiliser::where('branch_id',$this->id)->get();
    }
}
