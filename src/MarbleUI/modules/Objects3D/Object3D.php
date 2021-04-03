<?php

namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

class Object3D extends BaseObject
{

    private $x;
    private $y;
    private $z;

    public function __construct(AppGameKit $agk, $objectID)
    {
        $this->agk = $agk;
        parent::__construct($agk);
        $this->objectId = $objectID;
    }

    public function free()
    {
        $this->agk->DeleteObject($this->objectId);
    }

    public function isFree(): bool
    {

    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'position':
                if (is_array($value))
                    $this->agk->SetObjectPosition($this->objectId, $value[0], $value[1], $value[2]);
                break;
        }
    }

}