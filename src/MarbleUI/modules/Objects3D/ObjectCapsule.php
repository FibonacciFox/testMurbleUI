<?php


namespace MarbleUI\modules\Objects3D;


use fibonaccifox\AppGameKit;

class ObjectCapsule extends Object3D
{
    public function __construct(AppGameKit $agk, $diameter = 1, $height = 1, $axis = 0)
    {
        $objectID = $agk->CreateObjectCapsule($diameter, $height, $axis);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }

}