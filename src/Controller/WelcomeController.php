<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route ( '/welcome' ) ]
class WelcomeController extends AbstractController
{
    #[Route ( '/{name}/{gender}' , name: 'app_welcome_index_gender' , requirements: [ 'gender' => 'h|f' ], methods: [ 'GET' ]) ]
    public function indexCustom ( String $name , String $gender = "h" ): Response
    {
        $civility = '' ;
        switch ( $gender ) {
            case 'h':
                $civility = "M.";
                break;
            case 'f':
                $civility = "Mme.";
                break;
        }
        return $this -> render ( 'welcome/index_custom.html.twig' , ['name' => $name , 'civility' => $civility ,]);
        }
    #[Route ( '/{name}' , name: 'app_welcome_index_basic' , methods: [ 'GET' ]) ]
    public function indexBasic ( String $name ): Response
    {
        return new Response( 'Welcome ' . $name . ', you are in the "indexBasic" action(controller)' );
    }
}