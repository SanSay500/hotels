<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private const USER_VALIDATOR = [
        'name' => 'required',
        'phone' => 'required|numeric',
        'country' => 'required',
        'description' => '',
        'company' => 'required',
    ];
    private const USER_ERROR_MESSAGES = [
        'required' => 'Fill this field',
        'numeric' => 'Enter a number'
    ];

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function updateUser(Request $request, User $user){

        $validated = $request->validate(self::USER_VALIDATOR,
            self::USER_ERROR_MESSAGES);

        $user->fill([   'name'=>$validated['name'],
                'company'=>$validated['company'],
                'country'=>$validated['country'],
                'description'=>$validated['description'],
                'phone'=>$validated['phone']
            ]);
        $user->save();
        return redirect()->route('user.profile');
    }

    public function editUserForm(User $user){
        return view ('user_profile_edit', ['user'=>$user]);
    }

    public function showUserForm(User $user){
        return view ('user_profile', ['user'=>$user]);
    }

    public function history(){
        return view('order_history');
    }
}
