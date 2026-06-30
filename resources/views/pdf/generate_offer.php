<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\User; // Example model

class PdfReportController extends Controller
{
    protected $fpdf;

    public function __class(Fpdf $fpdf)
    {
        $this->fpdf = $fpdf;
    }

    public function generateUserReport()
    {
        // 1. Fetch data
        $users = User::latest()->take(10)->get();

        // 2. Initialize PDF Layout
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Helvetica', 'B', 14);
        
        // Title Cell
        $this->fpdf->Cell(0, 10, 'User Statistics Report', 0, 1, 'C');
        $this->fpdf->Ln(5);

        // Table Header
        $this->fpdf->SetFont('Helvetica', 'B', 10);
        $this->fpdf->Cell(20, 7, 'ID', 1);
        $this->fpdf->Cell(80, 7, 'Name', 1);
        $this->fpdf->Cell(90, 7, 'Email', 1);
        $this->fpdf->Ln();

        // 3. Populate Data Rows
        $this->fpdf->SetFont('Helvetica', '', 10);
        foreach ($users as $user) {
            $this->fpdf->Cell(20, 7, $user->id, 1);
            $this->fpdf->Cell(80, 7, $user->name, 1);
            $this->fpdf->Cell(90, 7, $user->email, 1);
            $this->fpdf->Ln();
        }

        // 4. Send to browser for layout streaming
        $this->fpdf->Output('I', 'user_report.pdf');
        exit;
    }
}
