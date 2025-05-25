<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SparesPreviewImport implements ToCollection, WithHeadingRow
{
    public $data;

    public function collection(Collection $rows)
    {
        $this->data = $rows;
    }
}