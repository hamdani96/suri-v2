<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Hobby;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends Controller
{
    public function checkRole()
    {
        if(Auth::user()) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->url('/');
        }
    }

    public function register()
    {
        $hobbies = Hobby::orderBy('hobby_name', 'asc')->get();
        $positions = Position::orderBy('position_name', 'asc')->get();

        return view('auth.register', compact('hobbies', 'positions'));
    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hobby_id' => 'required',
            'position_id' => 'required',
            'position_status' => 'required',
        ]);

        try {
            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->password = bcrypt($validated['password']);
            $user->role = 'user';
            $user->save();

            $detailUser = new DetailUser();
            $detailUser->user_id = $user->id;
            $detailUser->hobby_id = $validated['hobby_id'];
            $detailUser->position_id = $validated['position_id'];
            $detailUser->position_status = $validated['position_status'];
            $detailUser->created_by = $user->id;
            $detailUser->save();

            $notif = [
                'message' => 'Register Berhasil',
                'title' => 'Register'
            ];

            return redirect('login')->with($notif);
        } catch (Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
