<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubApiService
{
    public function getRepositories(string $repoUrl): array
    {
        return Http::get($repoUrl)->json();
    }
}
