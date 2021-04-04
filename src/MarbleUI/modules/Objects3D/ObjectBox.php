<?php


namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;

class ObjectBox extends Object3D
{
    public function __construct(AppGameKit $agk, $size = [1,1,1])
    {
        $objectID = $agk->CreateObjectBox($size[0], $size[1], $size[2]);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }

}