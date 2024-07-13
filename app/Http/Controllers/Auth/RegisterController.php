<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['nullable', 'string'],
            'nohp' => ['nullable', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'jabatan' => ['nullable', 'string', 'in:STAFF,Vice President,Senior Vice President'],
            'divisi' => ['nullable', 'string', 'in:Pemasaran,Produksi,IT'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['alamat'],
            'nohp' => $data['nohp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'jabatan' => $data['jabatan'],
            'divisi' => $data['divisi'],
            'is_approved' => false, // Set to false by default
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'Your account has been created and is pending approval by an administrator.');
    }
}
