<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class lead_export implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function view(): View
    {

        $data = Lead::orderBy("id", "desc")->get();
        return view("export.leadExport", ['data' => $data]);
    }
}
