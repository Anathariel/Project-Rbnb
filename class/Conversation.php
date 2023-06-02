<?php

class Conversation
{
    private $conversationId;
    private $u1Id;
    private $u2Id;

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
    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function getU1Id()
    {
        return $this->u1Id;
    }

    public function getU2Id()
    {
        return $this->u2Id;
    }

    //SETTERS
    public function setConversationId(int $conversationId)
    {
        $this->conversationId = $conversationId;
    }

    public function setU1Id(int $u1Id)
    {
        $this->u1Id = $u1Id;
    }

    public function setU2Id(int $u2Id)
    {
        $this->u2Id = $u2Id;
    }
}
