<?php


namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;

class ObjectBox extends Object3D
{

    public function __construct(AppGameKit $agk)
    {
        $objectID = $agk->CreateObjectBox(1, 1, 1);
        parent::__construct($agk, $objectID);
        //return $objectID;
    }

}