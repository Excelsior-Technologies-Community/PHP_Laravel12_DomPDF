<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserData;

class PDFController extends Controller
{
    // Show users + search
    public function index(Request $request)
    {
        $query = UserData::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orwhere('course', 'like', '%' . $request->search . '%')
                ->orwhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->latest()->get();

        return view('welcome-pdf', compact('users'));
    }

    // Download all users PDF
    public function generatePDF()
    {
        $users = UserData::all();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->download('users.pdf');
    }

    // Stream PDF
    public function streamPDF()
    {
        $users = UserData::all();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->stream('users.pdf');
    }

    // Bulk PDF (selected users)
    public function bulkPDF(Request $request)
    {
        $users = UserData::whereIn('id', $request->ids)->get();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->download('selected-users.pdf');
    }
}