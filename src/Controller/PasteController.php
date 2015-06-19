<?php
namespace ProjectRena\Controller;

use ProjectRena\RenaApp;

class PasteController
{
    protected $app;
    function __construct(RenaApp $app)
    {
        $this->app = $app;
    }

    public function pastePage()
    {
        $this->app->render('/paste/paste.twig');
    }

    public function postPaste()
    {
        $postData = $this->app->request->post("paste");
        $timeout = $this->app->request->post("timeout");
        if (isset($_SESSION["characterName"]))
        {
            $user = $this->app->users->getUserByName($_SESSION["characterName"]);
            $userID = $user["id"];
            $hash = md5(time().$_SESSION["characterName"].$_SESSION["characterID"]);
            $this->app->paste->createPaste($hash, $userID, $postData, $timeout);
            $this->app->redirect("/paste/{$hash}/");
        } else
        {
            $this->app->render("/paste/paste.twig", array("error" => "Error, you need to be logged in to post data"));
        }
    }

    public function showPaste($hash)
    {
        $data = $this->app->paste->getPasteData($hash);
        $pasteData = $data["data"];
        $pasteCreated = $data["created"];
        $this->app->render("/paste/pasteShow.twig", array("pasteData" => $pasteData, "pasteCreated" => $pasteCreated));
    }
}