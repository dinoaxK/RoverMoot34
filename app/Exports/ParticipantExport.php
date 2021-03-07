<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantExport implements FromArray, withHeadings
{
    protected $participant_array;

    public function __construct(array $participant_array)
    {
        $this->participant_array = $participant_array;
    }

    public function headings(): array{
        return [
            'District',
            'Title', 
            'First Name',
            'Middle Names', 
            'Last Name',
            'Initials',
            'Full Name',
            'DOB',
            'Gender',
            'Citizenship',
            'NIC/ Passport',
            'NIC/ Passport No',
            'Education/ Occupation',
            'Highest Scout Award',
            'Highest Scout Award Date',
            'Highest Rover Scout Award',
            'Highest Rover Scout Award Date',
            'Participant Type',
            'Warrant Number',
            'Warrant Expire',
            'Crew',
            'Mobile Telephone',
            'Home Telephone',
            'Address',
            'Country', 
            'ZIP', 
            'Contact Person', 
            'Contact Person Mobile', 
            'Contact Person Home', 
            'Submit Date', 
            'Payment Date', 
            'Payment Reference'
        ];
    }

    public function array(): array
    {
        return $this->participant_array;
    }
}
