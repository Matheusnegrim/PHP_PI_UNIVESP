@extends('templates.template')

@section('content')
    <h1 class="text-center">Cadastro de aulas</h1>

    <div class="text-center mt-4 mb-4">
        <a href="{{url('aulas/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
    <div class="col-8 m-auto">
        @csrf
            <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Aluno</th>
                <th scope="col">Professor</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Data</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($aula as $aulas)
                @php
                    $user=$aulas->find($aulas->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$aulas->id_user}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$aulas->nome_professor}}</td>
                    <td>{{$aulas->material}}</td>
                    <td>{{$aulas->data}}</td>
                    <td>
                        <a href="{{url("aulas/$aulas->id")}}">
                            <button class=" btn btn-info">Visualizar</button>
                        </a>
                        <a href="{{url("aulas/$aulas->id/edit")}}">
                            <button class=" btn btn-warning">Editar</button>
                        </a>
                        <a href="{{url("aulas/$aulas->id")}}" class="js-del">
                            <button class=" btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>


            @endforeach


            </tbody>
        </table>
    </div>
    <br>

    <h1 class="text-center">Relatórios</h1><br>
    <div class="text-center mt-4 mb-4">
        <form action="{{'relatorios'}}" method="post">
            @csrf
            <input type="text" name="search" placeholder="Nome do professor:">
            <button class="btn-dark" type="submit">Filtrar</button>
        </form>
    </div>
  <br>

    <div class="text-center mt-4 mb-4">
        <form action="{{'relatorios'}}" method="post">
            @csrf
            <input type="text" name="search" placeholder="Id do aluno:">
            <button class="btn-dark" type="submit">Filtrar</button>
        </form>
    </div>
@endsection

