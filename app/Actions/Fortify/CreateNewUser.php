<?php

namespace App\Actions\Fortify;

use App\Models\Code;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if ($input['register_code']) {

            $code = Code::where('code', $input['register_code'])->first();

            switch ($code->category) {
                case 'beginner':
                    return $user->assignRole('beginner');
                case 'intermediate':
                    return $user->assignRole('intermediate');
                case 'advanced':
                    return $user->assignRole('advanced');
                default:
                    return $user;
            }
        }

        return $user;
    }
}
