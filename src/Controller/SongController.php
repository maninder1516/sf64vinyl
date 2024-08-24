<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

class SongController extends AbstractController {

    #[Route('api/songs/{id<\d+>}', methods:['GET'], name:'api_songs_get_one' )]
    public function  getSong(int $id, LoggerInterface $logger): Response 
    {
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returning API response for song {song}',  ['song' => $id,]);
        // return new JsonResponse($song);
        return  $this->json($song);
    }
}