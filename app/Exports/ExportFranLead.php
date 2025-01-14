<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExportFranLead implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $frans = request()->session()->get("frans");
        $frans_id = $frans->id;
        return Lead::where(["fran_id" => $frans_id])->get();
    }


      public function headings(): array
    {
        return array_keys(Lead::first()->toArray());
    }
     

}
