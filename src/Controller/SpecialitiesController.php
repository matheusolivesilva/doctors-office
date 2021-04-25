<?php

namespace App\Controller;

use App\Entity\Speciality;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialitiesController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/specialities", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $requestData = $request->getContent();
        $jsonData = json_decode($requestData);
        $speciality = new Speciality();
        $speciality->setDescription($jsonData->description);
        $this->entityManager->persist($speciality);
        $this->entityManager->flush($speciality);
        return new JsonResponse($speciality, Response::HTTP_CREATED);
    }
}
