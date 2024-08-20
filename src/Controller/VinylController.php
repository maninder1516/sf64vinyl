<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VinylController {

    #[Route('/home')]
    public function homepage() : Response {
        //die('SF6 Vinyl');
        return new Response('Hello');
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null) : Response {
        $title = str_replace('-', ' ', $slug);
        //$title = ucfirst(str_replace('-', ' ', $slug))->title(true);

        return new Response('Genre: '.$title);
    }

}