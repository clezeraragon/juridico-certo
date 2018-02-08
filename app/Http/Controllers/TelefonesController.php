<?php

namespace JuridicoCerto\Http\Controllers;

use Illuminate\Http\Request;
use JuridicoCerto\Models\Telefone;
use Yajra\DataTables\DataTables;

class TelefonesController extends Controller
{
    protected $telefone;

    public function __construct( Telefone $telefone)
    {
        $this->telefone = $telefone;
    }

    public function index()
    {
        return view('telefones.index');
    }
    public function create()
    {
        return view('telefones.create');
    }

    public function ajaxDatatable()
    {
        $data = $this->telefone->with('cliente');

        return DataTables::of($data)
            ->addColumn('action', function ($telefone) {
                return '<a href="'.route('telefone.edit',$telefone->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->addColumn('nome_cliente', function ($telefone) {
                return $telefone->cliente->nome;
            })
            ->make(true);
    }

    public function edit($id)
    {
        $result = $this->telefone->find($id);
        return view('telefones.edit',compact('result'));
    }

    public function update($id,Request $request)
    {
//        dd($request->all());
        $this->telefone->find($id)->update($request->all());

        return redirect()->route('telefone.index');

    }

    public function store( Request $request)
    {
        $this->telefone->create($request->all());

        return redirect()->route('telefone.index');
    }
}
