<?php


namespace MarbleUI\modules\Objects3D;


use fibonaccifox\AppGameKit;

class ObjectCylinder extends Object3D
{
    public function __construct(AppGameKit $agk, $height = 1, $diameter = 1, $segments = 10)
    {
        $objectID = $agk->CreateObjectCylinder($height, $diameter, $segments);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }
}