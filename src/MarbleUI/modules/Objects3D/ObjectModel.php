<?php


namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;

class ObjectModel extends Object3D
{
    public function __construct(AppGameKit $agk, $file, $height = 1)
    {
        $path = $agk->getPath($file);
        $objectID = $agk->LoadObject($path, $height);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }
}