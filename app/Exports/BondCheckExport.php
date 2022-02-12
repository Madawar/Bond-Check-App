<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithTitle;

class BondCheckExport implements FromView, ShouldAutoSize, WithColumnWidths, WithStyles, WithTitle
{
    public $collection;

    public function __construct($collection, $airline)
    {
        $this->collection = $collection;
        $this->airline = $airline;
    }

    public function view(): View
    {
        return view('livewire.reports.report', [
            'awbs' => $this->collection
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'BondCheck ';
    }
}
