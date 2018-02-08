<?php

namespace JuridicoCerto\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use JuridicoCerto\Models\Cliente;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{

    protected $cliente;

    public function __construct( Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        return view('clientes.index');
    }
    public function create()
    {
        return view('clientes.create');
    }

    public function ajaxDatatable()
    {
       $data = $this->cliente->with('telefones');

       return DataTables::of($data)
           ->addColumn('action', function ($cliente) {
               return '<a href="'.route('clientes.edit',$cliente->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
           })
           ->make(true);
    }

    public function edit($id)
    {
        $result = $this->cliente->find($id);
        return view('clientes.edit',compact('result'));
    }

    public function update($id,Request $request)
    {
        $this->cliente->find($id)->update($request->all());

        return redirect()->route('clientes.index');

    }

    public function store( Request $request)
    {
        $this->cliente->create($request->all());

        return redirect()->route('clientes.index');
    }

}
