<?php

namespace App\Http\Controllers;

use Livewire\Features\SupportFormObjects\Form;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
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
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function showAdmins()
    {
        $users = User::all();
        $admins = User::role('Administrador')->get();

        return view('admin.users.showAdmins', compact('admins', 'users'));
    }

    public function showCliente()
    {
        $users = User::all();
        /* $cliente = User::role('Cliente')->get(); */
        $cliente = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Cliente');
        })->get();


        return view('admin.users.showCliente', compact('cliente', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'direccion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric'],
            'password' => ['required', new Password],
            'role' => ['required', Rule::in(['Administrador', 'Cliente'])],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Asignar el rol al usuario
        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')->with('success', 'Usuario registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::find($id);

        $image = asset('/img/user-default.jpeg');
        if ($usuario->foto_perfil) {
            $expiresAt = Carbon::now()->addSeconds(5);
            $imageReference = app('firebase.storage')->getBucket()->object($usuario->foto_perfil);
            if ($imageReference->exists()) {
                $image = $imageReference->signedUrl($expiresAt);
            };
        }
        return view('admin.users.show', compact('usuario', 'image'));
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

    // ...

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
            // Otras actualizaciones...

            // Actualiza la ruta de la foto de perfil solo si se proporciona una nueva foto
            'profile_photo_path' => $request->hasFile('foto_perfil')
                ? $request->file('foto_perfil')->store('profile-photos', 'public')
                : $user->profile_photo_path,
        ]);

        // Actualizar el rol del usuario
        $selectedRole = Role::find($request->input('role'));
        $user->syncRoles([$selectedRole->name]);

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
