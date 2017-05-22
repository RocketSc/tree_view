<?php

include_once __DIR__ . '/User.php';
include_once __DIR__ . '/Reader.php';

$reader = new Reader;

$users = $reader->getAllUsers();


$new = [];
foreach ($users->getArray() as $a){
    $new[$a['parentid']][] = $a;
}

$tree = createTree($new, $new[current($new)[0]['parentid']]);



function createTree(&$list, $parent){
    $tree = array();
    foreach ($parent as $k=>$l){
        if(isset($list[$l['id']])){
            $l['children'] = createTree($list, $list[$l['id']]);
        }
        $tree[] = $l;
    }
    return $tree;
}



include __DIR__ . '/users_view.php';