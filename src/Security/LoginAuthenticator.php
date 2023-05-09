<?php

namespace App\Security;

use App\Service\ValidationApiService;
use Symfony\Component\DependencyInjection\Variable;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
//use App\Controller\ValidationApiService;

class LoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';
    

    public function __construct(private UrlGeneratorInterface $urlGenerator, private ValidationApiService $validationApiService)
    {
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        //when the user is validated , we have to go and search in ypareo to see if he already exists to show the right form
        //echo ypareo_exists($email);
        //$email="a@a.com";
        $email = $request->request->get('email', '');


        //$email="o_VRIMzpr";
        
        //$exist= $this->validationApiService -> apiGetIdPays("FRANCE");

        //var_dump($exist);
        //dd($exist);
        //dd($this->validationApiService->getUrl());
        //die;
    
/*
         if ($exist){
            //email already  exist in ypareo - ask form profesionnelle
            return new RedirectResponse($this->urlGenerator->generate('app_formulaire_ypareo'));
         }else{
            //ask the form coordonees and form profesionnelle 
            return new RedirectResponse($this->urlGenerator->generate('app_formulaire'));
         }

*/


        // For example:
        
        //return new RedirectResponse($this->urlGenerator->generate('app_login'));
        return new RedirectResponse($this->urlGenerator->generate('app_formulaire'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
