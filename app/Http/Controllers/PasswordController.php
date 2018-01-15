<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function reset()
    {
        return view('profile.reset');
    }

    public function resetPost(Request $request)
    {
    	$this->validate($request, [
			'password' => 'required|min:6|confirmed'
		]);

		$user = \Auth::user();
		$user->password = bcrypt($request->password);
		$user->save();

		return redirect('/perfil/alterar-senha')->with('success', 'Senha atualizada com sucesso.');
    }
}
