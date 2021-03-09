<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromArray, withHeadings
{
    protected $user_array;

    public function __construct(array $user_array)
    {
        $this->user_array = $user_array;
    }

    public function headings(): array{
        return [
            'ID',
            'Name',
            'Email', 
            'Email Verified At',
            'Role'
        ];
    }

    public function array(): array
    {
        return $this->user_array;
    }
}
