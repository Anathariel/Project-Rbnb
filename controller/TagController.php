<?php

class TagController extends Controller
{
    public function showAllTags()
    {

        $tagModel = new TagModel();
        $tags = $tagModel->getAllTags();

        echo self::getRender('header.html.twig', ['tags' => $tags]);
    }
}
