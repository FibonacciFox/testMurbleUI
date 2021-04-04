<?php


namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;

class ObjectPlane extends Object3D
{
    public function __construct(AppGameKit $agk, $width = 1, $height = 1)
    {
        $objectID = $agk->CreateObjectPlane($width, $height);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }
}