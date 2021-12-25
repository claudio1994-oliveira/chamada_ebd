<?php

namespace App\Http\Controllers;

use App\Models\ProfessorPorTurma;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessorPorTurmaController extends Controller
{
    /**
     * @var ProfessorPorTurma
     */
    private $professorPorTurma;
    /**
     * @var Turma
     */
    private $turma;
    /**
     * @var User
     */
    private $user;

    public function __construct(ProfessorPorTurma $professorPorTurma, Turma $turma, User $user)
    {
        $this->professorPorTurma = $professorPorTurma;
        $this->turma = $turma;
        $this->user = $user;
    }

    public function index()
    {
        $professorPorTurma  = $this->professorPorTurma::all();
        $usuario = $this->user;
        $turma = $this->turma;

        return view('user.professor-por-turma', ['turma'=>$turma, 'usuario' => $usuario, 'professorPorTurma' => $professorPorTurma]);
    }

    public function create()
    {
       $turmas = $this->turma->all();
       $professores = $this->user->where('perfil_id',3)->get();

       return view('user.novo-professor-por-turma', ['turmas' => $turmas, 'professores' => $professores ]);
    }

    public function store(Request $request)
    {
        $professorPorTurma = $this->professorPorTurma;
        if(count($professorPorTurma->where([
            'professor_id' => $request->professor,
            'turma_id' => $request->turma
        ])->get()) == 1)
        {
            return redirect()->back()->withErrors('Professor já associado nessa turma!');
        }

        $professorPorTurma->create([
            'professor_id' => $request->professor,
            'turma_id' => $request->turma
        ]);

        return redirect()->back()->with('success','Professor associado com sucesso!');

    }
}
