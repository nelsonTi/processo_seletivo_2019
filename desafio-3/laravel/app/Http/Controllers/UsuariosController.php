<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\model\Usuario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('created_at', 'desc')->paginate(10);
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UsuarioFormRequest $request)
    {
        DB::beginTransaction();
        $usuario = new Usuario();
        $usuario->fill($request->all());
        $usuario->data_nascimento = Carbon::parse($request['data_nascimento'])->format('Y-m-d');
        $usuario->senha = bcrypt($request['senha']);
        $usuario->save();
        DB::commit();
        return redirect()->route('/')->with('message', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UsuarioFormRequest $request)
    {

        DB::beginTransaction();
        $usuario = Usuario::findOrFail($request->id);
        $usuario->fill($request->all());
        $usuario->data_nascimento = Carbon::parse($request['data_nascimento'])->format('Y-m-d');
        $usuario->senha = bcrypt($request['senha']);
        $usuario->save();
        DB::commit();


        if (!empty($request['senha'])) {
            $usuario->senha = bcrypt($request['senha']);
        }
        return redirect()->route('/')->with('message', 'Usuário alterado!');
    }

    public function destroy($id)
    {

        DB::beginTransaction();
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        DB::commit();

        return redirect()->route('/')->with('alert-success', 'Usuário removido!');
    }
}
