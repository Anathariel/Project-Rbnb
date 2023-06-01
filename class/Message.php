<?php

class Message
{
    private $messageId;
    private $conversationId;
    private $senderId;
    private $content;
    private $timestamp;

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

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function getConversationId()
    {
        return $this->conversationId;
    }

    public function getSenderId()
    {
        return $this->senderId;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    //SETTERS

    public function setMessageId(int $messageId)
    {
        $this->messageId = $messageId;
    }

    public function setConversationId(int $conversationId)
    {
        $this->conversationId = $conversationId;
    }

    public function setSenderId(int $senderId)
    {
        $this->senderId = $senderId;
    }

    public function setContent(int $content)
    {
        $this->content = $content;
    }

    public function setTimestamp(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }
}
