<?php

namespace App\Service;

use Twig\Environment;

class DemoService
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function myMethod() : Response
    {
        $htmlContents = $this->twig->renderView('twigPages/list.html.twig', [
            'name' => 'Diya',
            'age' => '21',
        ]);
        return Response($htmlContents);
    }
}

?>