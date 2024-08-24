<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use function Symfony\Component\String\u;
use Twig\Environment;

class VinylController extends AbstractController {

    #[Route('/', name:'app_homepage')]
    public function homepage(Environment $twig) : Response {
        //die('SF6 Vinyl');
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

       // dd($tracks); // Dump and Die

        //return new Response('Hello');
        // return $this->render('vinyl/homepage.html.twig', [
        //     'title' => 'Welcome to Vinyl',
        //     'tracks' => $tracks
        // ]);
        
        $html = $twig->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);

        return new Response($html);
    }

    #[Route('/browse/{slug}', name:'app_browse')]
    public function browse(string $slug = null) : Response {
        $title = str_replace('-', ' ', $slug);
        //$title = ucfirst(str_replace('-', ' ', $slug))->title(true);

        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig', [           
            'genre' => $genre
        ]);
    }

}