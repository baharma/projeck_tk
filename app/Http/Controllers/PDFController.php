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
                'class_id' => $request->query('class_id'),
            ]
        );

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }
        $pdf = PDF::loadView('pdf.registration-student', ['students' => $data]);

        return $pdf->stream('registration_students.pdf', ['Attachment' => false]);
    }

    public function validAndParentInfoPDF(Request $request){

        $data = $this->repositoryStudent->finds($request->query('id'));

        if (is_null($data)) {
            return response()->json(['message' => 'No data found'], 404);
        }
        $pdf = PDF::loadView('pdf.registration-parent-student', ['student' => $data]);

        return $pdf->stream('registration_students.pdf', ['Attachment' => false]);
    }
}
