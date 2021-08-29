<?php

namespace App\Exports;
use App\Models\Trainer;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrainerExport implements FromCollection
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
        return Trainer::where('branch_id',$this->id)->get();
    }
}
