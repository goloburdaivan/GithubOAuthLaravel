<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\GithubRepositoriesService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login() {
        return Socialite::driver('github')
            ->scopes(['read:user', 'public_repo', 'private_repo'])
            ->redirect();
    }

    public function authUser(GithubRepositoriesService $repositoriesService) {
        $userData = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'github_id' => $userData->id,
        ], [
            'github_id' => $userData->id,
            'name' => $userData->name,
            'email' => $userData->email,
            'remember_token' => $userData->token,
            'github_token' => $userData->token,
            'github_refresh_token' => $userData->refreshToken ?? null,
            'repos_url' => $userData->user['repos_url']
        ]);

        if ($user->wasRecentlyCreated) {
            $repositoriesService->loadRepositories($user);
        }

        Auth::login($user);
        return redirect('/');
    }
}
