<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function generatepdf(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|mimes:docx|max:10048', // Updated to 'docx' MIME type
        ]);

        // Get the uploaded file
        $file = $request->file('pdf_file');

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load the DOCX file into the Dompdf instance
        $dompdf->loadHtml($file->get());

        // Set the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Get the PDF output as a string
        $pdf = $dompdf->output();

        // Save the PDF to disk
        $filename = $file->getClientOriginalName() . '.pdf';
        Storage::put('pdfs/' . $filename, $pdf);

        // Return a success message
        return redirect()->back()->with('success', 'PDF generated successfully.');
    }

}
