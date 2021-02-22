<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class HomeController extends AbstractController
{
    /**
    * @Route("/",name="homepage")
    */    
    public function index(Request $request): Response
    {
        return $this->render("home/index.html.twig", ["name" => $request->query->get('name')]);
    }
}