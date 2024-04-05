<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

// Using the base controller class AbstractController
class DemoController extends AbstractController{

    //Accessing method of base controller class
    /**
     * @Route("/conDemo1", name="baseController_demo")
     */
    public function baseControllerdemo(): Response{
        // For redirecting to some page
        // return $this->redirectToRoute('app_lucky_number');

        // 301 Moved Permanently redirect status response code
        // return $this->redirectToRoute('app_lucky_number', [], 301);

        // php constants for permanant redirection
        // return $this->redirectToRoute('app_lucky_numver', [], Response::HTTP_MOVED_PERMANENTLY);

        // redirect to the current route
        // return $this->redirectToRoute($request->attributes->get('_route'));

        // return $this->redirect('http://symfony.com/doc');

        // $url = $this->generateUrl('app_lucky_number');

        // rendering template
        return $this->render('pages/index.html.twig');

        // return new Response(
        //     '<html><body>I am a demo of generate url. <a href='.$url.'>Click Me</a>   </body></html>'
        // );
    }

    // Injecting service in controller
    /**
     * @Route("/conDemo2/{max}")
     */
    public function injectingService(int $max, LoggerInterface $logger): Response
    {
        $logger->info('We are logging!');
        return new Response(
            '<html><body>I am a demo of injecting service</body></html>'
        );
    }

    // Managing Error and 404 pages
    /**
     * @Route("/conDemo3")
     */
    public function managingError(){
        // this exception ultimately generates a 500 status error
        // HTTP 500 - internal server error
        throw new \Exception('Something went wrong!');
        throw $this->createNotFoundException("Page does not exists");
    }

    // How to use Request object in Controller as parameter.
    /**
     * @Route("conDemo4/{page}")
     */
    public function requestObject(Request $request): Response{
        // $page = $request->query->get('page',1);

        // $request->isXmlHttpRequest(); // is it an Ajax request?

        // $request->getPreferredLanguage(['en', 'fr']);

        // // retrieves GET and POST variables respectively
        // $request->query->get('page');
        // $request->request->get('page');

        // // retrieves SERVER variables
        // $request->server->get('HTTP_HOST');

        // // retrieves an instance of UploadedFile identified by foo
        // $request->files->get('foo');

        // // retrieves a COOKIE value
        // $request->cookies->get('PHPSESSID');

        // // retrieves an HTTP request header, with normalized, lowercase keys
        // $request->headers->get('host');
        // $request->headers->get('content-type');

        return new Response(
            '<html><body>I am a demo of request object. '. $request->server->get('HTTP_HOST').'</body></html>'
        );

        // $response = new Response('Hello '.$name, Response::HTTP_OK);

        // // creates a CSS-response with a 200 status code
        // $response = new Response('<style> ... </style>');
        // $response->headers->set('Content-Type', 'text/css');
    }

    //managing the session
    /**
     * @Route("conDemo5")
     */
    public function manageSession(): Response{
        
        $this->addFlash(
            'notice',
            'I am flash message',
            
        );
        return $this->render('pages/index.html.twig');
    }

    // Returning JSON response from controller (for APIs)
    /**
     * @Route("conDemo6")
     */
    public function jsonResponseDemo(): jsonResponse {

        return $this->json(['name' => "diya"]);
    }
}

?>


