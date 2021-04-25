<?php

namespace App\Helper;

use App\Entity\Doctor;
use App\Repository\SpecialityRepository;

class DoctorFactory
{
    /**
     * @var SpecialityRepository
     */

    public function __construct(SpecialityRepository $specialityRepository)
    {
        $this->specialityRepository = $specialityRepository;
    }

    public function createDoctor(string $json): Doctor
    {
        $jsonData = json_decode($json);
        $specialityId = $jsonData->specialityId;
        $speciality = $this->specialityRepository->find($specialityId);
        $doctor = new Doctor();
        $doctor
            ->setCrm($jsonData->crm)
            ->setName($jsonData->name)
            ->setSpeciality($speciality);
        return $doctor;
    }
}
