<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private const USER_VALIDATOR = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required|numeric',
        'country' => 'required',
        'company' => 'required',
    ];
    private const USER_ERROR_MESSAGES = [
        'required' => 'Fill this field',
        'numeric' => 'Enter a number'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateProfile(Request $request, User $user){
        $validated = $request->validate(self::USER_VALIDATOR,
            self::USER_ERROR_MESSAGES);
        $user>fill(
            ['name'=>$validated['name'],
                'company'=>$validated['company'],
                'country'=>$validated['country'],
                'description'=>$validated['description'],
                'phone'=>$validated['phone'],
            ]);
        $user->save();
        return redirect()->route('home');
    }

    public function editUserProfileForm(){
        return view ('user_profile_edit');
    }

    public function showUserProfileForm(User $user){
        return view ('user_profile', ['user'=>$user]);
    }
}
