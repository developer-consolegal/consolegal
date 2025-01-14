<?php

namespace App\Exports;

use App\Models\email_subscribe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmailExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return array_keys(email_subscribe::first()->toArray());
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return agents_model::all();
        return collect(email_subscribe::all());
    }
}
