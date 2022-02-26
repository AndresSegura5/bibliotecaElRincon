<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    //
    public function index()
    {
        $data = User::all();

        return view('usuarios.index', compact('data'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){

        $image_name = $this->fileUpload($request);

        $input = $request->all();

        User::where('email', $input['email'])
                ->update([
                    'name' => $input['name'],
                    'foto' => $image_name
                ]);


        return redirect()->route('home')->with('success', 'Usuario updated successfully');
    }

    public function fileUpload(Request $request) {

        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $image->move($destinationPath, $name);

            return $name;
        }
    }

}
