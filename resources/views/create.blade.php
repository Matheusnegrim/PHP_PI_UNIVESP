@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastrar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('aulas')}}">
            @csrf
            <select class="form-control" name="id_user" id="id_user">
                <option value="">Aluno</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="material" id="material" placeholder="Conteúdo:"value="{{$aula->material ?? ''}}"  required><br>
            <input class="form-control" type="text" name="nome_professor" id="nome_professor" placeholder="Professor:" value="{{$aula->nome_professor ?? ''}}"required><br>
            <input class="form-control" type="date" name="data" id="data" placeholder="Data:"value="{{$aula->data ?? ''}}" required><br>
            <input class="form-control" type="time" name="início_aula" id="início_aula" placeholder="Início da Aula:" value="{{$aula->início_aula ?? ''}}" required><br>
            <input class="form-control" type="time" name="fim_aula" id="fim_aula" placeholder="Fim da Aula:" value="{{$aula->fim_aula ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value=@if(isset($aula))Editar @else Cadastrar @endif>
        </form>

    </div>

@endsection

