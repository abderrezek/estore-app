<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $provider = [ "google", "facebook" ];

    /**
     * Redirect the user to specific provider authentication page.
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function redirect (Request $request) {
        $provider = strtolower($request->provider);

        if (in_array($provider, $this->provider)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    /**
     * Obtain the user information from provider
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function callback (Request $request) {
        $provider = strtolower($request->provider);

        if (in_array($provider, $this->provider)) {
            $data = Socialite::driver($request->provider)->user();

            if ($provider === "google") {
                $user = User::where('google_id', $data->getId())->first();
            } else if ($provider === "facebook") {
                $user = User::where('facebook_id', $data->getId())->first();
            }

            if ($user) {
                Auth::login($user);
                return redirect()->route("home");
            } else {
                $request->session()->put('USER', $data);
                return redirect()->route("new-password", ['provider' => $provider]);
            }
        }
        abort(404);
    }

    /**
     * add new password
     * @param  Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function addPassword (Request $request) {
        $provider = strtolower($request->provider);

        if (in_array($provider, $this->provider)) {
            if ($request->session()->has('USER')) {
                Validator::make($request->all(), [
                    'password' => ['required', 'string', new Password, 'confirmed'],
                ])->validate();
                $data = $request->session()->get('USER');

                $userNewData = [
                    'email' => $data->getEmail(),
                    'role' => 'client',
                    'last_connect' => Carbon::now()->toDateTimeString(),
                    'password' => Hash::make($request->input('password')),
                ];
                if ($provider === "google") {
                    $userNewData["first_name"] = $data->user['given_name'];
                    $userNewData["last_name"] = $data->user['family_name'];
                    $userNewData["google_id"] = $data->getId();
                } else if ($provider === "facebook") {
                    $fullName = explode(" ", $data->getName());
                    $userNewData["first_name"] = $fullName[0];
                    $userNewData["last_name"] = $fullName[1];
                    $userNewData["facebook_id"] = $data->getId();
                }
                $request->session()->forget('USER');
                $newUser = User::create($userNewData);
                Auth::login($newUser);
                return redirect()->route('home');
            }
        }
        abort(404);
    }
}
