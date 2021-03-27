<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => ['nullable', 'digits:10'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'role' => 'client',
            'last_connect' => Carbon::now()->toDateTimeString(),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ];

        if ($input['mobile'] != null) {
            $user += ['mobile' => $input['mobile']];
        }

        return User::create($user);
    }
}
