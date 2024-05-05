<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }
    public function index()
    {
        $students = $this->student->all();

        return response()->json([
            'success' => true,
            'data' => $students
        ]);
    }

    public function store(StudentRequest $request)
    {
        $data = $request->all();

        $student = $this->student->create($data);

        if($student) {
            return response()->json(['message' => 'Estudante criado com sucesso'], 200);
        }
        else {
            return response()->json(['message' => 'Erro ao criar estudante'], 400);
        }
    }

    public function show($id)
    {
        $student = $this->student->find($id);

        if($student) {
            return response()->json($student);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Estudante não encontrado'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $student = $this->student->find($id);
        $student->update($data);

        if($student) {
            return response()->json(['message' => 'Estudante atualizado com sucesso'], 201);
        }
        else {
            return response()->json(['message' => 'Erro ao atualizar estudante'], 400);
        }
    }

    public function destroy($id)
    {
        $student = $this->student->find($id);

        $result = $student->delete();

        if($result) {
            return response()->json(['message' => 'Estudante deletado com sucesso']);
        }
        else {
            return response()->json(['message' => 'Erro ao deletar estudante']);
        }


    }
}
