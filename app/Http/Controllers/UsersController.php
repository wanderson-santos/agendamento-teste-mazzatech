<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = \App\User::all();

        return view('users.index', compact('users'));
    }

    public function details($id)
    {
        $user = \App\User::findOrFail($id);
    
        return view('users.details', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = \App\User::create($data);

        return redirect("usuarios/{$user->id}/detalhes")->with('success', 'Cadastrado usuario com successo');
    }

    public function edit($id)
    {
        $user = \App\User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email,' . $id
        ]);

        $user = \App\User::findOrFail($id);

        $data = $request->all();

        if ($data['password'] != '') {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect("usuarios/{$user->id}/detalhes")->with('success', 'Usuario alterado com successo');
    }

    public function delete($id)
    {
        $user = \App\User::findOrFail($id);

        return view('users.delete', compact('user'));
    }

    public function destroy($id, Request $request)
    {
        $user = \App\User::findOrFail($id);

        /*$user->deleted_reason = $request->reason;
        $user->deleted_user = \Auth::user()->id;
        $user->save();*/

        $user->delete();

        return redirect('/usuarios')->with('success', 'Usuario deletado com successo');
    }
}
