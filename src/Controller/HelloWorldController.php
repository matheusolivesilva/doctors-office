<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    /**
     * @Route("/hello")
     */
    public function helloWorldAction(Request $request): Response
    {
        $pathInfo = $request->getPathInfo();
        $query = $request->query->all();
        return new JsonResponse([
            'message' => 'Hello World!', 
            'pathInfo' => $pathInfo,
            'query' => $query
        ]);
    }
}
