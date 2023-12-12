<?php

namespace App\Http\Controllers;

use Livewire\Features\SupportFormObjects\Form;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit',$user)->with('info','Rol Asignado Correctamente');
        dd('hola');
    } */

    /*public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

         if ($request->hasfile('foto_perfil')) {

            if ($user->foto_perfil) {
                if (app('firebase.storage')->getBucket()->object($user->foto_perfil)->exists()) {
                    app('firebase.storage')->getBucket()->object($user->foto_perfil)->delete();
                }
                $user->update(['foto_perfil' => null]);
            }
            $image = $request->file('foto_perfil');
            $firebase_storage_path = 'Users/';
            $extension = $image->getClientOriginalExtension();
            $file = $user->id . '.' . $extension;
            $localfolder = public_path('firebase-temp-uploads') . '/';

            if ($image->move($localfolder, $file)) {
                $uploadedfile = fopen($localfolder . $file, 'r');
                app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
                $user->update((['foto_perfil' => $firebase_storage_path . $file]));
                unlink($localfolder . $file);
            }
        } 

        $user->update($request->except(['foto_perfil']));
        return redirect()->route('users.index', $user)->with('status', 'Empleado Actualizado Exitosamente!');
    }*/

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Usuario no encontrado');
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'estado' => $request->input('estado'),
            'role' => $request->input('role'),
            // Asegúrate de incluir todos los campos que deseas actualizar
        ]);

        // Puedes manejar la actualización de la foto de perfil si es necesario
        if ($request->hasFile('foto_perfil')) {
            // Lógica para manejar la actualización de la foto de perfil
        }

        return redirect()->route('users.index')->with('status', 'Empleado actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/users')->with('success', 'Usuario eliminado exitosamente');
        } else {
            return redirect('/users')->with('error', 'Usuario no encontrado');
        }
    }
}
