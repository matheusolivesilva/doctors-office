<?php
namespace App\Controller;

use App\Entity\Doctor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DoctorsController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

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
        
        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
        return new JsonResponse($doctor);
    }
}

