<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class LoginldapListener
{
    private $manager;
   

    public function _construct(EntityManagerInterface $manager)
    {
        $this->manager=$manager;
    }

    public function OnSuccessLogin(InteractiveLoginEvent $event)
    {
        $request=$event->getRequest();

        $token=$request->getAuthenticationToken();

        $LogUsers=$token->getUsers();

        if($LogUsers instanceof Users)
        {
            dd($LogUsers);
        }

    }
}




