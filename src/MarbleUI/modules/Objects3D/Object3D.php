<?php

namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

class Object3D extends BaseObject
{
    /**
     * @var array
     */
    private array $position;
    private int $x;
    private int $y;
    private int $z;
    private bool $visible;

    var $Tag;

    private bool $softDelete;

    public function __construct(AppGameKit $agk)
    {
        $this->softDelete = false;
        $this->agk = $agk;
        parent::__construct($agk);
    }

    public function free()
    {
        $this->agk->DeleteObject($this->objectId);
        $this->softDelete = true;
    }

    public function isFree(): bool
    {
        return $this->softDelete;
    }

    public function __set($property, $value)
    {
        //var_dump($property);
        switch ($property) {
            case 'position':
                if (is_array($value)) {
                    $this->position = $value;
                    $this->agk->SetObjectPosition($this->objectId, $value[0], $value[1], $value[2]);
                }
                break;
            case 'x':
                $this->x = $value;
                $this->y = $this->agk->GetObjectY($this->objectId);
                $this->z = $this->agk->GetObjectZ($this->objectId);
                $this->position = [$this->x, $this->y, $this->z];
                $this->agk->SetObjectPosition($this->objectId, $this->x, $this->y, $this->z);
                break;
            case 'y':
                $this->x = $this->agk->GetObjectX($this->objectId);
                $this->y = $value;
                $this->z = $this->agk->GetObjectZ($this->objectId);
                $this->position = [$this->x, $this->y, $this->z];
                $this->agk->SetObjectPosition($this->objectId, $this->x, $this->y, $this->z);
                break;
            case 'z':
                $this->x = $this->agk->GetObjectX($this->objectId);
                $this->y = $this->agk->GetObjectY($this->objectId);
                $this->z = $value;
                $this->position = [$this->x, $this->y, $this->z];
                $this->agk->SetObjectPosition($this->objectId, $this->x, $this->y, $this->z);
                break;
            case 'visible':
                $this->visible = $value;
                $this->agk->SetObjectVisible($this->objectId, $value);
                break;
        }
        parent::__set($property, $value);
    }

    public function __get($property)
    {
        switch ($property) {
            case 'position':
                $this->position = [ $this->agk->GetObjectX($this->objectId), $this->agk->GetObjectY($this->objectId), $this->agk->GetObjectZ($this->objectId) ];
                return $this->position;
                break;
            case 'x':
                $this->x = $this->agk->GetObjectX($this->objectId);
                return $this->x;
                break;
            case 'y':
                $this->y = $this->agk->GetObjectY($this->objectId);
                return $this->y;
                break;
            case 'z':
                $this->z = $this->agk->GetObjectZ($this->objectId);
                return $this->z;
                break;
            case 'visible':
                $this->visible = $this->agk->GetObjectVisible($this->objectId);
                return $this->visible;
                break;
        }

        return parent::__get($property);
    }

}