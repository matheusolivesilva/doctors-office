<?php
namespace App\Controller;

use App\Entity\Doctor;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DoctorsController
{
    /**
     * @Route("/doctors", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $requestBody = $request->getContent();
        $jsonData = json_decode($requestBody);

        $doctor = new Doctor();
        $doctor->crm = $jsonData->crm;
        $doctor->name = $jsonData->name;

        return new JsonResponse($doctor);
    }
}

