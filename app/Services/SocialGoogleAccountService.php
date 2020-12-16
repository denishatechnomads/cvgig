<?php
namespace App\Services;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Facades\Socialite;

class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $user = Socialite::driver('google')->user();
        $account = User::whereProvider('google')->whereProviderId($providerUser->getId())->first();
        if ($account) {
            return $account;
        }
        else {
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'provider_id' => $providerUser->getId(),
                    'provider' => 'google',
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(rand(1,10000)),
                ]);
            }
            return $user;
        }
    }
}
