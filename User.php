<?php

class User
{
    private $id;
    private $name;
    private $parent_id;
    private $children = [];

    public function __construct($id, $name, $parent_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_id = $parent_id;
    }


    public function getId() : string
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getParentId() : string
    {
        return $this->parent_id;
    }

    public function addChild(User $user)
    {
        $this->children[] = $user;
    }
}