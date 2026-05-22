<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserData;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class PDFController extends Controller
{
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

    public function generatePDF()
    {
        $users = UserData::all();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->download('users.pdf');
    }

    public function streamPDF()
    {
        $users = UserData::all();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->stream('users.pdf');
    }

    public function bulkPDF(Request $request)
    {
        $users = UserData::whereIn('id', $request->ids)->get();

        $pdf = Pdf::loadView('pdf.example', compact('users'));

        return $pdf->download('selected-users.pdf');
    }

    public function generateDynamicPDF(Request $request, $id)
    {
        $user = UserData::findOrFail($id);
        
        $data = [
            'title' => 'Professional Invoice',
            'user' => $user
        ];

        $pdf = Pdf::loadView('pdf.dynamic_invoice', $data);

        if ($request->action == 'download') {
            return $pdf->download('Invoice_' . $user->name . '.pdf');
        }

        return $pdf->stream('Invoice_' . $user->name . '.pdf');
    }

    public function sendPDFEmail($id)
    {
        $user = UserData::findOrFail($id);
        
        $data = [
            'title' => 'Professional Invoice',
            'user' => $user
        ];

        $pdf = Pdf::loadView('pdf.dynamic_invoice', $data);

        Mail::to($user->email)->send(new InvoiceMail($pdf->output()));

        return back()->with('success', 'PDF Email has been sent successfully to ' . $user->email);
    }
}