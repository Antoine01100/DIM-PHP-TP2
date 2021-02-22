<?php
namespace App\Controller;



use Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Response;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

abstract class AbstractController
{
    private ?RouterInterface $RouterInterface ;

    public function render($templateName, $data = []): Response   
    {
        $loader = new FilesystemLoader(__DIR__ . "/../../templates");
        $twig = new Environment($loader, [
            'cache' => __DIR__ . "/../../var/cache/",
            'debug' => true,
        ]);
        
        return new Response($twig->render($templateName, $data));
    }

    function getRouterInterface() {
        return $this->RouterInterface;
    }

    function setRouterInterface($RouterInterface) {
        $this->RouterInterface = $RouterInterface;
    }

    public function redirectTo($path):Response{
        return new RedirectResponse($path);
    }
}