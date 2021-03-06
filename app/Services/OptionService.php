<?php

namespace App\Services;

use App\Repositories\OptionRepository;

class OptionService extends BaseService
{
    protected $createRules = [
        'name' => 'required|string',
        'value' => 'required|string',
    ];
    protected $updateRules = [
        'name' => 'string',
        'value' => 'string',
    ];

    public function __construct(OptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByName($name)
    {
        return $this->repository->findByName($name);
    }
}
