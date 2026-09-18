<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection(): Collection
    {
        return Student::with('institution')->orderBy('name', 'asc')->get();
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Student Name',
            'Email',
            'Institution',
        ];
    }

    public function map($student): array
    {
        return [
            'NIS' => $student->nis,
            'Student Name' => $student->name,
            'Email' => $student->email,
            'Institution' => $student->institution->name,
        ];
    }
}
