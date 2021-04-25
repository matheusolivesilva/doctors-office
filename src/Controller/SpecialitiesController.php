<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Repository\SpecialityRepository;
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

    /**
     * @var SpecialityRepository
     */
    private $specialityRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        SpecialityRepository $specialityRepository
    ) {
        $this->entityManager = $entityManager;
        $this->specialityRepository = $specialityRepository ;
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


    /**
     * @Route("/specialities", methods={"GET"})
     */
    public function getAll(): Response
    {
        $specialityList = $this->specialityRepository->findAll();
        return new JsonResponse($specialityList);
    }

    /**
     * @Route("/specialities/{id}", methods={"GET"})
     */
    public function searchSpeciality(int $id): Response
    {
        return new JsonResponse($this->specialityRepository->find($id));
    }
}
