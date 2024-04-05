<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


Class TemplateAndTwigDemoController extends AbstractController{

    

    /**
     * @Route("tempDemo", name="demo_index")
     */
    public function home(){
        $list = array(["name" => "diya", "id" => "1"], ["name" => "riya", "id" => "2"]);
        return $this->render('twigPages/list.html.twig', [
            "list" => $list,
        ]);
    }

    /**
     * @Route("/show/{id}", name="demo_show")
     */
    public function show($id) {
        $adminEmail = $this->getParameter('app.admin_email');
        return new Response(
            '<html><body>Your id is: '.$id.'</body></html>'
        );
    }

    // {# the CSS file lives at "public/css/blog.css" #}
    // <link href="{{ asset('css/blog.css') }}" rel="stylesheet"/>

    // {# the JS file lives at "public/bundles/acme/js/loader.js" #}
    // <script src="{{ asset('bundles/acme/js/loader.js') }}"></script>

    // RenderView only returns a content so that we can use that later in response object. /
    // $contents = $this->renderView('product/index.html.twig', [
    //     'category' => '...',
    //     'promotions' => ['...', '...'],
    // ]);
    // return new Response($contents);

    //embedding controllers
    public function reusableTempControllerDemo(){

        return $this->render('twigPages/_reusable.html.twig');
    }

}


// Understand basic templating structure in Symfony
// How to override templates
// How to use variables in twig
// Syntax of twig templates
// Add CSS, JS or other assets
// App global variable.
// Adding custom global variables. 

?>