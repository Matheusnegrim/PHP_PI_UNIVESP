<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Models\ModelAula;
use App\Models\User;

class AulaController extends Controller
{
    private $objUser;
    private $objAula;

    public function __construct(){
        $this->objUser=new User();
        $this->objAula=new ModelAula();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $aula=$this->objAula->all()->sortBy('data');
        return \view('index', compact('aula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $cad=$this->objAula->create([
            'id_user'=>$request->id_user,
            'material'=>$request->material,
            'nome_professor'=>$request->nome_professor,
            'data'=>$request->data,
            'início_aula'=>$request->início_aula,
            'fim_aula'=>$request->fim_aula
        ]);
        if($cad){
            return redirect('aulas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $aula=$this->objAula->find($id);
        return view('show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $aula=$this->objAula->find($id);
        $users=$this->objUser->all();
        return view('update',compact('aula', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->objAula->where(['id'=>$id])->update([
            'material'=>$request->material,
            'nome_professor'=>$request->nome_professor,
            'data'=>$request->data,
            'início_aula'=>$request->início_aula,
            'fim_aula'=>$request->fim_aula
        ]);
        return redirect('aulas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $del=$this->objAula->destroy($id);
        return($del)?"sim":"não";
    }
    public function search(Request $request)
    {
        $aula=$this->objAula->where('nome_professor', 'LIKE', "%{$request->search}%")
            ->orWhere('id_user', 'LIKE', "%{$request->search}%")
            ->paginate();
        return \view('relatorio', compact('aula'));
    }
}
