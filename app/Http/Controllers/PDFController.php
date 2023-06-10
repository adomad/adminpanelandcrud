<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Employee;


use Illuminate\Support\Facades\View;

class PDFController extends Controller
{
    public function downloadPDF($id)
    {
        // Get the employees data
        $employees = Employee::whereIn('id', [1, 2, 3])->get();;

        // Create a new instance of Dompdf
        $pdf = new Dompdf();

        // Load the HTML view with the employees data
        $html = View::make('pdf.invoice', ['employees' => $employees])->render();

        // Load the HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $pdf->render();

        // Output the PDF content
        return $pdf->stream('invoice.pdf');
    }
}
