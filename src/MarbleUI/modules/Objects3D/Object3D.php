<?php

namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

class Object3D extends BaseObject
{
    /**
     * @var array
     */
    var array $position;
    var int $x;
    var int $y;
    var int $z;
    var bool $visible;

    var $Tag;

    private $_data;

    private bool $softDelete;

    public function __construct(AppGameKit $agk, $objectID)
    {
        $this->softDelete = false;
        $this->agk = $agk;
        parent::__construct($agk);
        $this->objectId = $objectID;
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

    public function SetData($key, $value){
        $this->_data[$key] = $value;
    }

    public function GetData($key){
        return $this->_data[$key];
    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'position':
                if (is_array($value)) {
                    $this->position = $value;
                    $this->agk->SetObjectPosition($this->objectId, $value[0], $value[1], $value[2]);
                }
                break;
            case 'x':
                var_dump($value);
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
    }

}