@extends('layouts.template')

@section('cabecalho')
    Editar Usuário
@endsection

@section('conteudo')
    @include('components.flash-message')
    <form method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Nome</label>
                        <input type="text" name="name" id="name" value="{{$usuario->name}}" required class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Usuário</label>
                        <input type="email" name="email" value="{{$usuario->email}}" id="email" required class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <select class="form-control" name="perfil_id" aria-label="Default select example" required>
                            <option selected value="">Selecione</option>
                            <option selected value="{{$perfilAtual->id}}">{{$perfilAtual->perfil}}</option>
                            @foreach($perfis as $perfil)
                                <option value="{{ $perfil->id  }}">{{ $perfil->perfil  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil</label>
                        <select class="form-control" name="estado_civil" aria-label="Default select example" required>
                            <option selected value="{{$usuario->estado_civil}}">{{$usuario->estado_civil}}</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Viuvo(a)">Viuvo(a)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" id="data_nascimento" value="{{$usuario->data_nascimento}}" required class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="turma">Turma</label>
                        <select class="form-control" name="turma_id" aria-label="Default select example" required>
                            <option selected value="{{$turmaAtual->id}}" hidden>{{$turmaAtual->nome_turma}}</option>
                            @foreach($turmas as $key => $turma)
                                <option value="{{ $turma->id  }}">{{ $turma->nome_turma  }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md">
                    <button type="submit" class="btn btn-primary mt-3">
                        Atualizar
                    </button>
                </div>
            </div>
        </div> <!-- Final do container -->
    </form>
@endsection

