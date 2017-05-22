<?php

include_once __DIR__ . '/User.php';

class UsersCollection
{
    private $array = [];

    public function add(User $user) : void
    {
        if ( $this->searchById( $user->getId() ) ) {
            //user is in collection already
            return;
        }

        $this->array[] = $user;
    }

    public function remove(User $user)
    {
        $this->searchById( $user->getId() );
    }

    public function searchById($id)
    {
        foreach ($this->array as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }

        return 0;
    }

    public function getCollection() : array
    {
        return $this->array;
    }

    public function getArray(): array
    {
        $result = [];

        foreach ($this->array as $user) {
            $result[] = ['id' => $user->getId(),
                         'parentid' => $user->getParentId(),
                         'name' => $user->getName()
            ];
        }

        return $result;
    }


    public function sortByParentId() : void
    {
        usort($this->array, function(User $a, User $b) {
        if ( $a->getParentId() === $b->getParentId() ) {
            return 0;
        }

        return ( $a->getParentId() < $b->getParentId() ) ? -1 : 1;
    });

    }

    public function addChildren()
    {
        foreach ($this->array as $user) {
            $parent = $this->searchById( $user->getParentId() );

            if (!$parent) {
                continue;
            }

            $parent->addChild($user);
        }
    }
}