<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\AnswersByStatusExport;
use Maatwebsite\Excel\Facades\Excel;


class userDetailController extends Controller
{
    //
    public function showUserDetail()
    {
        $users = User::with('answers')->get();
        return view('admin.user_page', compact('users'));

    }

//excel ecpirt
    public function exportTracerByStatus()
    {
        return Excel::download(new AnswersByStatusExport, 'tracer_by_status.xlsx', \Maatwebsite\Excel\Excel::XLSX, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="tracer_by_status.xlsx"',
        ]);

    }

}
