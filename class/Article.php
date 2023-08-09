<?php

class Article
{
    private $articleId;
    private $author;
    private $image;
    private $title;
    private $extract;
    private $content;
    private $date;


    public function __construct(array $post)
    {
        $this->hydrate($post);
    }

    private function hydrate(array $post)
    {
        foreach ($post as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //GETTERS
    public function getArticleId()
    {
        return $this->articleId;
    }
    public function getAuthor()
    {
        return $this->author;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getExtract()
    {
        return $this->extract;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }

    //SETTERS
    public function setArticleId(int $articleId)
    {
        $this->articleId = $articleId;
    }
    public function setAuthor(int $author)
    {
        $this->author = $author;
    }

    public function setImage(String $image)
    {
        $this->image = $image;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setExtract(string $extract)
    {
        $this->extract = $extract;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function setDate(String $date)
    {
        $this->date = $date;
    }
}
