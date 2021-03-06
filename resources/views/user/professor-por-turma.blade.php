@extends('layouts.template')

@section('cabecalho')
    Professor por Turma
@endsection
@section('conteudo')
    @include('components.flash-message')
    <div class="table-responsive">
        <table class="table" id="datatablesSimple">
            <thead>
            <tr class="">
                <th scope="col">Professor</th>
                <th scope="col">Turma</th>
                @if(Auth::user()->perfil_id === 1 )
                    <th scope="col">Ações</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($professorPorTurma as $professor)
                <tr>
                    <td>{{ $usuario->find($professor->professor_id)->name }}</td>
                    <td>{{ $turma->find($professor->turma_id)->nome_turma }}</td>
                    @if(Auth::user()->perfil_id === 1)
                        <td>
                                    <form action="{{route('excluir-professor')}}" method="post" onsubmit="return confirm('Tem certeza?')" >
                                        @csrf
                                        <input type="hidden" name="turma_id" value="{{ $professor->turma_id }}">
                                        <input type="hidden" name="professor_id" value="{{ $professor->professor_id}}">
                                        <button class="btn btn-danger" alt="Excluir"  ><i class="fa fa-eraser" aria-hidden="true"></i></button>
                                    </form>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection




