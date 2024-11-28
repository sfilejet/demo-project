<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Cake\Http\Response;

/**
 * CheckRole middleware
 */
class CheckRoleMiddleware 
{
    /**
     * Invoke method.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Message\ResponseInterface $response The response.
     * @param callable $next Callback to invoke the next middleware.
     * @return \Psr\Http\Message\ResponseInterface A response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $session = $request->getAttribute('session');
        $user = $session->read('Auth.User');
        
        if(!is_null($user) &&  $user['role']['name'] != ADMIN_ROLE){
            
            $currentUrl = $request->getUri()->getPath();
            
            // Check if the user is not on the /pages page (or any other page you want to redirect to)
            if ($currentUrl !== '/pages') {
                return $response->withStatus(302) // HTTP status code for redirection
                    ->withHeader('Location', "/"); // Redirection to /pages
            }
        }
        
        return $next($request, $response);
    }
}
