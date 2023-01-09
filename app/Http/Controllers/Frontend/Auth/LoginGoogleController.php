<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(){
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->route('frontend.main.index');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'thumb' => $user->avatar,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google'),
                    'role_id' => 3,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]);
                Auth::login($newUser);
                return redirect()->route('frontend.main.index');
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
