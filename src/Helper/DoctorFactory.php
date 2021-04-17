<?php

namespace App\Helper;

use App\Entity\Doctor;

class DoctorFactory
{
    public function createDoctor(string $json): Doctor
    {
        $jsonData = json_decode($json);
        $doctor = new Doctor();
        $doctor->crm = $jsonData->crm;
        $doctor->name = $jsonData->name;
        return $doctor;
    }
}
