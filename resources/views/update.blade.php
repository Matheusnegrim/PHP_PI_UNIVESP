@extends('templates.template')

@section('content')
    <h1 class="text-center">Editar</h1> <hr>

    <div class="col-8 m-auto">
        <form name="formEdit" id="formEdit" method="post" action="{{url("aulas/$aula->id")}}">
            @csrf
            <input type="hidden" name="_method" value="put">
            <select class="form-control" name="id_user" id="id_user">
                <option value="">Aluno</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
            <input class="form-control" type="text" name="material" id="material" placeholder="Conteúdo:"value="{{$aula->material}}"  ><br>
            <input class="form-control" type="text" name="nome_professor" id="nome_professor" placeholder="Professor:" value="{{$aula->nome_professor}}"><br>
            <input class="form-control" type="date" name="data" id="data" placeholder="Data:"value="{{$aula->data}}" ><br>
            <input class="form-control" type="time" name="início_aula" id="início_aula" placeholder="Início da Aula:" value="{{$aula->início_aula}}" ><br>
            <input class="form-control" type="time" name="fim_aula" id="fim_aula" placeholder="Fim da Aula:" value="{{$aula->fim_aula}}" ><br>
            <input class="btn btn-primary" type="submit" value=Editar>
        </form>

    </div>

@endsection

