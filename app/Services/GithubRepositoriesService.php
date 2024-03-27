<?php

namespace App\Services;

use App\Builders\RepositoryBuilder;
use App\Models\User;

class GithubRepositoriesService
{
    public function __construct(protected GithubApiService $githubApiService)
    {
    }
    public function loadRepositories(User $user): void {
        $repos = $this->githubApiService->getRepositories($user->repos_url);
        foreach ($repos as $repo) {
            $repository = (new RepositoryBuilder($repo))->build();
            $repository->user_id = $user->id;
            $repository->save();
        }
    }
}
