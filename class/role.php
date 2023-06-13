<?php

class User
{
    private $roleId;
    private $uid;
    private $user;
    private $owner;
    private $administrator;

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
    public function getRoleId()
    {
        return $this->roleId;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getAdministrator()
    {
        return $this->administrator;
    }

    //SETTERS
    public function setRoleId(String $roleId)
    {
        $this->roleId = $roleId;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function setUser(string $user)
    {
        $this->user = $user;
    }

    public function setOwner(string $owner)
    {
        $this->owner = $owner;
    }

    public function setAdministrator(String $administrator)
    {
        $this->administrator = $administrator;
    }
}
