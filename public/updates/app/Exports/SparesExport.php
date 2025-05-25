<?php

namespace App\Exports;

use App\Models\SpareInfo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SparesExport implements FromCollection, WithHeadings
{
    protected $fields;

    public function __construct(array $fields = [])
    {
        $this->fields = $fields;
    }

    public function collection()
    {
        $fieldsToExport = empty($this->fields)
            ? ['manufacturer', 'hardware_type', 'hardware_category', 'descriptions', 'part_model1', 'part_model2', 'part_model3', 'serial_model', 'warehouse_loc', 'hardware_site', 'platform_type', 'received_by']
            : $this->fields;

        return SpareInfo::select($fieldsToExport)->get();
    }

    public function headings(): array
    {
        return empty($this->fields)
            ? ['manufacturer', 'hardwaretype', 'hardwarecategory', 'descriptions', 'partmodel1', 'partmodel2', 'partmodel3', 'serialmodel', 'warehouselocation', 'hardwaresite', 'platformtype', 'receivedby']
            : $this->fields;
    }
}
