<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//use statements from GitHub example
//https://github.com/artikcloud/sample-webapp-php/blob/master/src/AppBundle/Controller/DefaultController.php

use ArtikCloud as ArtikCloud;
use ArtikCloud\Configuration as Configuration;
use ArtikCloud\Api as Api;
use ArtikCloud\ApiException as ApiException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * (Pasted from same Github mentioned above)
     * @Route("/callback/artikcloud", name="callback-artikcloud")
     */
    public function oauth2RedirectURI(Request $request)
    {
        
        $code = $request->query->get('code');
        $state = $request->query->get('state');
        if (strcmp($state, $this->get('session')->get('state')) !== 0) {
           echo 'state parameter must match';
           $this->redirectToRoute('homepage');
        }
        $response = json_decode($this->exchangeCode($code), true);
        $session = $this->get('session');
        $session->set('token', $response);
        
        $userResponse = json_decode($this->getUserFullName($response['access_token']), true);
        $session->set('user', $userResponse);
        return $this->redirectToRoute('homepage'); 
    }

    /**
     * (Similar function found in Github mentioned above)
     * @Route("/message/get", name="message-get")
     */
    public function getMessage(Request $request) 
    {
        $this->initARTIKCloudConfiguration();
        $params = $this->jsonParamsToArray($request);
        $messages_api = new Api\MessagesApi();
        $count = 1;
        $sdids = $params['deviceId'];
        try {
             $response = $messages_api->getLastNormalizedMessages($count, $sdids);
             return new Response($response);
        } catch (ArtikCloud\ApiException $e) {
             return new Response(json_encode($e->getResponseBody()), $e->getCode());
        } catch (\Exception $e) {
             
             return new Response($e->getMessage(), $e->getCode());
        }
       
    }
}
