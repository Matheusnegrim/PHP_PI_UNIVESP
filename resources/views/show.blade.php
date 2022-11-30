@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $user=$aula->find($aula->id)->relUsers;
        @endphp

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Aluno</th>
                <th scope="col">Professor</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Data</th>
                <th scope="col">Início</th>
                <th scope="col">Término</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$aula->id_user}}</th>
                <td>{{$user->name}}</td>
                <td>{{$aula->nome_professor}}</td>
                <td>{{$aula->material}}</td>
                <td>{{$aula->data}}</td>
                <td>{{$aula->início_aula}}</td>
                <td>{{$aula->fim_aula}}</td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="text-center">
        <a href="{{url('aulas')}}">
            <button class="btn btn-primary">Voltar</button>
        </a>
    </div>

@endsection

