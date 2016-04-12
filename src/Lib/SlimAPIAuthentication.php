<?php
namespace ProjectRena\Lib;

use Slim\Middleware;

class SlimAPIAuthentication extends Middleware
{
    /**
     * Call
     *
     * Perform actions specific to this middleware and optionally
     * call the next downstream middleware.
     */
    public function call()
    {
        $path = $this->app->request->getPathInfo();
        if(stristr($path, "/api/authed/")) {
            // Check for the auth header
            // Check the db for this auth code to see if it even exists
            // If it exists, allow the user to use the endpoint
            // If it doesn't exist, we give them an error
        }
        $this->next->call();
    }
}