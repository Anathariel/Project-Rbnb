<?php

class TagController extends Controller
{

    public function tag()
    { 

        

            $tagModel = new TagModel();

            $tag = $tagModel->tag();


        echo self::getTwig()->render('tag.html.twig', ['tag' => $tag]);
    }
}
