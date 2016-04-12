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
            $headers = $this->app->request->headers;
            $renaApiToken = isset($headers["Authorization"]) ? $headers["Authorization"] : false;

            $contentType = $this->app->request->getContentType() == "application/xml" ? "application/xml" : "application/json";

            // Check there even is an apiToken set
            if($renaApiToken === false) {
                return render("", array("error" => "You seem to be missing an authorization header. Please try again"), 401, $contentType);
            }

            // If there is one, now we'll check it's valid!
            $characterID = $this->app->Users->getCharacterIDByRenaApiToken($renaApiToken);
            if(!$characterID) {
                return render("", array("error" => "You seem to be attempting to access without a valid apiToken. Please obtain a real one, and try again"), 401, $contentType);
            }

            // Everything checked out, so they can pass
        }
        $this->next->call();
    }
}