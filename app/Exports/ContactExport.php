<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return array_keys(Contact::first()->toArray());
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return agents_model::all();
        return collect(Contact::all());
    }
}
