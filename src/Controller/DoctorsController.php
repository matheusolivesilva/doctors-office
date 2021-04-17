<?php
namespace App\Controller;

use App\Entity\Doctor;
use App\Helper\DoctorFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DoctorsController extends AbstractController 
{
    private $entityManager;
    private $doctorFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        DoctorFactory $doctorFactory
    ) {
        $this->entityManager = $entityManager;
        $this->doctorFactory = $doctorFactory;
    }

    /**
     * @Route("/doctors", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $requestBody = $request->getContent();
        $doctor = $this->doctorFactory->createDoctor($requestBody);
        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
        return new JsonResponse($doctor);
    }

    /**
     * @Route("/doctors", methods={"GET"})
     */
    public function getAll(): Response
    {
        $repositoryOfDoctors = $this
            ->getDoctrine()
            ->getRepository(Doctor::class);
        $doctorList = $repositoryOfDoctors->findAll();
        return new JsonResponse($doctorList);
    }


    /**
     * @Route("/doctors/{id}", methods={"GET"})
     */
    public function getOne(int $id): Response
    {
        $doctor = $this->searchDoctor($id);
        $statusCode = is_null($doctor) ? Response::HTTP_NO_CONTENT : 200;
        return new JsonResponse($doctor, $statusCode);
    }
    
    /**
     * @Route("/doctors/{id}", methods={"PUT"})
     */
    public function update(int $id, Request $request)
    {
        $requestBody = $request->getContent();
        $sentDoctor = $this->doctorFactory->createDoctor($requestBody);
        $existingDoctor = $this->searchDoctor($id);
        if(is_null($existingDoctor)) {
            return new Response(Response::HTTP_NOT_FOUND);
        }
        $existingDoctor->crm = $sentDoctor->crm;
        $existingDoctor->name = $sentDoctor->name;
        $this->entityManager->flush();
        return new JsonResponse($existingDoctor);
    }

    /**
     * @param int $id
     * @return object\null
     */
    public function searchDoctor(int $id)
    {
        $repositoryOfDoctors = $this
            ->getDoctrine()
            ->getRepository(Doctor::class);
        $doctor = $repositoryOfDoctors->find($id);
        return $doctor;
    }
}

