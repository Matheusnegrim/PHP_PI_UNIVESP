@extends('templates.template')

@section('content')
    <h1 class="text-center">Consulta de aulas</h1><br>
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

                </tr>


            @endforeach


            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="{{url('aulas')}}">
            <button class="btn btn-primary">Voltar</button>
        </a>
    </div>
@endsection

