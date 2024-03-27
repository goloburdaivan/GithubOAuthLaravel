<?php

namespace App\Builders;

use App\Models\Repository;

class RepositoryBuilder
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build(): Repository
    {
        $repository = new Repository();
        $repository->name = $this->data['name'];
        $repository->full_name = $this->data['full_name'];
        $repository->html_url = $this->data['html_url'];
        $repository->language = $this->data['language'];
        $repository->stargazers_count = $this->data['stargazers_count'];

        return $repository;
    }
}
