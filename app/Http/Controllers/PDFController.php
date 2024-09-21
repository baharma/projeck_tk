<?php

namespace App\Http\Controllers;

use App\Repositories\RegistrationStudentRepository;
use Illuminate\Http\Request;
use PDF;


class PDFController extends Controller
{
    protected $repositoryStudent;

    public function __construct(RegistrationStudentRepository $repo)
    {
        $this->repositoryStudent = $repo;
    }
    public function registrasiStudent(Request $request)
    {
        $data = $this->repositoryStudent->orderDataRegistraasiStuden(
            [
                'status' => $request->query('status'),
                'date_start' => $request->query('date_start'),
                'date_end' => $request->query('date_end'),
            ]
        );

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }
        $pdf = PDF::loadView('pdf.registration-student', ['students' => $data]);

        return $pdf->stream('registration_students.pdf', ['Attachment' => false]);
    }
}
