<?php

namespace App\Service;

class BuildRepository
{
    public function findAll():string
    {
        return 'All Buildings';

    }

    public function findOneBy(int $id)
    {
        return "build with Id: ".$id;
    }

}