<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TaskExport implements FromCollection, ShouldAutoSize {

    use Exportable;
    public function collection() {
        return Task::all();
    }

    public function view() {
        return view('page.task.index', [
            'item' => Task::all()
        ]);
    }
}
