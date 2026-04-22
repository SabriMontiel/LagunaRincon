<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }
    public function loginPost()
    {
        $model = new UsuarioModel();

        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $usuario = $model->where('email', $email)
                         ->where('contrasena', $pass)
                         ->first();

        if ($usuario) {
           session()->set([
    'usuario_id' => $usuario['usuario_id'],
    'nombre' => $usuario['nombreCompleto']
]);
            return redirect()->to('cabanas');
        } else {
            return redirect()->back()->with('error', 'Datos incorrectos o usuario no registrado');
        }
    }

   public function registro()
{
    return view('registro');
}

public function guardarUsuario()
{
    $model = new UsuarioModel();

    $email = $this->request->getPost('email');
    $nombre = $this->request->getPost('nombre');
    $pass = $this->request->getPost('password');

    if ($model->where('email', $email)->first()) {
        return redirect()->back()->with('error', 'El email ya está registrado');
    }

    $usuario_id = $model->insert([
        'nombreCompleto' => $nombre, 
        'telefono' => '',            
        'email' => $email,
        'contrasena' => $pass,
        'tipoUsuario_id' => 1        
    ]);

    session()->set('usuario_id', $usuario_id);

    return redirect()->to('cabanas');
}
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}