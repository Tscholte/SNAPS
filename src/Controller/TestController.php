<?php


namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     * @Route("/")
     */
    public function home(){
        return new Response('test 1 2 3');
    }

    /**
     * @Route("/test/{slug}")
     */
    public function test($slug){
        return new Response(sprintf(
            'this is a test "%s"',
            $slug
        ));
    }
}