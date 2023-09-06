<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;



class PDFController extends Controller
{
    public function showUploadForm()
    {
        return view('home');
    }
    function generateDocument(Request $request)
    {
        $request->validate([
            'docx_file' => 'required|mimes:docx|max:10048', // Adjust max file size as needed
        ]);

        // Get the uploaded DOCX file
        $docxFile = $request->file('docx_file');

        // Check if the file is valid
        if ($docxFile->isValid()) {
            // Convert the DOCX file to PDF
            $pdf = \PhpOffice\PhpWord\IOFactory::createWriter($docxFile, 'PDF');
            $pdfFilePath = storage_path('app/pdf/') . uniqid() . '.pdf';
            $pdf->save($pdfFilePath);

            // Provide the path to the saved PDF for download
            return response()->download($pdfFilePath, 'converted.pdf')->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Invalid file uploaded.');
    }
}
