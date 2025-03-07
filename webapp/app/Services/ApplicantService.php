<?php

namespace App\Services;

use App\Repositories\ApplicantRepository;

class ApplicantService
{
    protected $applicantRepository;

    public function __construct(ApplicantRepository $applicantRepository)
    {
        $this->applicantRepository = $applicantRepository;
    }

    public function getAll()
    {
        return $this->applicantRepository->getAll();
    }

    public function findById($id)
    {
        return $this->applicantRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->applicantRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->applicantRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->applicantRepository->delete($id);
    }
}
