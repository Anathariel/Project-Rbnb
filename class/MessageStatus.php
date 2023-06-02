<?php

class MessageStatus
{
    private $messageStatusId;
    private $messageId;
    private $uid;
    private $status;

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
    public function getMessageStatusId()
    {
        return $this->messageStatusId;
    }

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getStatus()
    {
        return $this->status;
    }

    //SETTERS
    public function setMessageStatusId(int $messageStatusId)
    {
        $this->messageStatusId = $messageStatusId;
    }

    public function setMessageId(int $messageId)
    {
        $this->messageId = $messageId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }
}
