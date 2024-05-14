<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersCreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::with('profile.toko')->find($id);
        
        return view('admin.profile', [
            'user' => $user
        ]);
    }
    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
        ]);

        $roleName = $request->role == 'superadmin' ? 'superadmin' : 'user';
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }

        if ($user) {
            Auth::login($user);
            return redirect()->route('show-products')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('register')
                ->with('error', 'Failed to create user');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('show-products');
        } else {
            return redirect()->route('login')
                ->with('error', 'Login failed email or password is incorrect');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->google_id = $user->id;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = Hash::make(Str::random(15));
            $newUser->gender = 'male';
            $newUser->age = 24;
            $newUser->birth = '2000-05-10';
            $newUser->address = 'Malang';
            $newUser->save();

            $newUser->assignRole('user');

            Auth::login($newUser);
        }

        return redirect()->route('show-products');
    }

    public function showListUser(Request $request){
        $user = Auth::user();
        $user = User::get();
        
        return view('admin.users.index', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(UsersCreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
        ]);

        $roleName = $request->role == 'superadmin' ? 'superadmin' : 'user';
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->assignRole($role);
        }

        return redirect()->route('list-users')->with('success', 'Data Produk Berhasil dibuat.');
    }

    public function showUpdate(User $user)
    {
        // $user = Auth::user();
        // dd($user->roles[0]->name);
        $user = User::find($user->id);
        
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function update(UsersEditRequest $request, User $user)
    {
        // $user = Auth::user();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->save();
            
        return redirect()->route('list-users')
        ->with('success', 'Data User Berhasil diubah.');
    }

    public function delete(User $user)
    {
        // $user = Auth::user();
        $user = User::find($user->id);

        if (Auth::id() == $user->id) {
            return redirect()->back()->with('delete_error', 'You cannot delete yourself');
        }
    
        $user->delete();
        return redirect()->back()->with('success', 'Data User berhasil dihapus.');
    }
}