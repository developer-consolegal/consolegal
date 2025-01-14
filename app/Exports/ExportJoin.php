<?php

namespace App\Exports;

use App\Models\JoinApp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportJoin implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return array_keys(JoinApp::first()->toArray());
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return agents_model::all();
        return collect(JoinApp::orderBy("id","desc")->get());
    }
}
