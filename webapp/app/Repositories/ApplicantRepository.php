<?php

namespace App\Repositories;

use App\Models\Applicant;

class ApplicantRepository
{
    public function getAll()
    {
        return Applicant::all();
    }

    public function findById($id)
    {
        return Applicant::findOrFail($id);
    }

    public function create(array $data)
    {
        return Applicant::create($data);
    }

    public function update($id, array $data)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->update($data);
        return $applicant;
    }

    public function delete($id)
    {
        return Applicant::destroy($id);
    }
}
