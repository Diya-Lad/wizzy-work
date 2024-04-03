<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

// Routes group and prefixes
// /**
//  * @Route("/hello", requirements={"_locale": "en|es|fr"}, name="blog_")
//  */
class RouteDemoController extends AbstractController{

    /**
     * @Route("/demo")
     */
    public function demo(){

        return new Response(
            '<html><body>Hello World</body></html>'
        );
    }

    /**
     * @Route("/demo1", methods={"GET"})
     */
    public function fun(){
        return new Response(
            '<html><body>Routing with name parameter</body></html>'
        );
    }

    // // Matching Http methods
    // /**
    //  * @Route("/demo/show/{id}", methods={"GET","HEAD"})
    //  */
    // public function show(int $id): Response
    // {
    //     return new Response(
    //         '<html><body>Id is '.$id.'</body></html>'
    //     );
    // }

    // /**
    //  * @Route("/demo/edit/{id}", methods={"PUT"})
    //  */
    // public function edit(int $id): Response
    // {
    //     return new Response(
    //         '<html><body>I am from edit method where id is '.$id.'</body></html>'
    //     );
    // }

    //Matching expression
    // Use the condition option if you need some route to match based on some arbitrary matching logic

    // Parameter validation
    /**
     * @Route("/demo/{num}", name="blog_list", requirements={"num"="\d+"})
     */
    public function number(int $num): Response
    {
        // \d+ is a regular expression that matches a digit of any length. 
        return new Response(
            '<html><body>I am from Parameter validation</body></html>'
        );
    }

    // Optional parameter
    // /**
    //  * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
    //  */
    // public function fun(int $page = 1): Response
    // {
    //     // ...
    // }
    // To make a parameter compulsary add ! sign before parameter

    // Combine both requiment and default behavior
    // /**
    //  * @Route("/demo12/{num<\d+>?1}")
    //  */
    // public function fun1(int $num): Response{
    //     return new Response(
    //         '<html><body>Hello...</body></html>'
    //     );
    // }

    //Parameter converter
    // /**
    //  * @Route("/demo2/{num}")
    //  */
    // public function show(BlogPost $post): Response
    // {
    //     // $post is the object whose slug matches the routing parameter

    //     // ...
    // }

    // Special parameter
    // like _controller, _locale, _format
    // /**
    //  * @Route("demo3/{_locale}/fun2.{_format}", locale="en", format="html", requirements={"_locale":"en|fr", } )
    //  */
    // public function fun2(int $num): Response{
    //         return new Response(
    //             '<html><body>Hello...</body></html>'
    //         );
    //     }

    //Extra parameter
    // extra parameters can ve passsed in defaults option
    // /**
    //  * @Route("/demo/{num}", name="blog_index", defaults={"name": "diya", "title": "Hello world!"})
    //  */
    // public function index(int $page, string $title): Response
    // {
        
    // }

    // Get the routing name and parameter
    // /**
    //  * @Route("/demo4")
    //  */
    // public function fun3(Request $request): Response
    // {
    //     $routeName = $request->attributes->get('_route');
    //     $routeParameters = $request->attributes->get('_route_params');

    //     // use this to get all the available attributes (not only routing ones):
    //     $allAttributes = $request->attributes->all();
        
    //     return $this->render('pages/number.html.twig');
        
    // }
    
    //Generating URLs in Controllers
    // /**
    //  * @Route("/demo5")
    //  */
    // public function fun4(): Response
    // {
    //     $url1 = $this->generateUrl('demo_fun');
    //     return new Response(
    //         "<html><body>"."<a href=$url1 >Link</a>"."</body></html>"
    //                 );
    // }
    
}

?>