<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportAgentLead implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $agents = request()->session()->get("agents");
        $agents_id = $agents->id;
        return Lead::where(["agent_id" => $agents_id])->get();
    }

    
      public function headings(): array
    {
        return array_keys(Lead::first()->toArray());
    }
     
}
