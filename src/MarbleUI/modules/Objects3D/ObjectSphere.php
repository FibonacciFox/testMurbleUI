<?php


namespace MarbleUI\modules\Objects3D;


use fibonaccifox\AppGameKit;

class ObjectSphere extends Object3D
{
    public function __construct(AppGameKit $agk, $diameter = 1, $rows = 10,  $columns = 10)
    {
        $objectID = $agk->CreateObjectSphere($diameter, $rows, $columns);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }
}