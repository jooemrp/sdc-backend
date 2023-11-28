<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ContactExport implements
    ShouldAutoSize,
    FromView
{

    public function __construct()
    {
        // 
    }

    public function view(): View
    {
        return view('admin.contact.export', [
            'data' => Contact::all()
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
