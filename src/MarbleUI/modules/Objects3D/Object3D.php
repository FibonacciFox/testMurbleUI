<?php

namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

/**
 * Class Text
 *
 * @property float $x - X position of a text object in world coordinates.
 * @property float $y - Y position of a text object in world coordinates.
 * @property float $z - Z position of a text object in world coordinates.
 * @property array $position - Z position of a text object in world coordinates.
 * @property bool $visible - Z position of a text object in world coordinates.
 * @package MarbleUI\modules\Objects3D
 */
class Object3D extends BaseObject
{
    /**
     * @var array
     */
    private float $x;
    private float $y;
    private float $z;
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

    public function MoveX(float $x)
    {
        $this->CheckPosition('x');
        $this->x += $x;
        $this->UpdatePosition();
    }

    public function MoveY(float $y)
    {
        $this->CheckPosition('y');
        $this->y += $y;
        $this->UpdatePosition();
    }

    public function MoveZ(float $z)
    {
        $this->CheckPosition('z');
        $this->z += $z;
        $this->UpdatePosition();
    }

    public function SetX(float $x)
    {
        $this->CheckPosition('y');
        $this->CheckPosition('z');
        $this->x = $x;
        $this->UpdatePosition();
    }

    public function SetY(float $y)
    {
        $this->CheckPosition('x');
        $this->CheckPosition('z');
        $this->y = $y;
        $this->UpdatePosition();
    }

    public function SetZ(float $z)
    {
        $this->CheckPosition('x');
        $this->CheckPosition('y');
        $this->z = $z;
        $this->UpdatePosition();
    }

    public function SetPosition(array $position)
    {
        $this->x = $position[0];
        $this->y = $position[1];
        $this->z = $position[2];
        $this->UpdatePosition();
    }

    public function GetX()
    {
        return $this->x;
    }

    public function GetY()
    {
        return $this->y;
    }

    public function GetZ()
    {
        return $this->z;
    }

    public function GetPosition()
    {
        return [$this->x, $this->y, $this->z];
    }

    private function UpdatePosition()
    {
        $this->agk->SetObjectPosition($this->objectId, $this->x, $this->y, $this->z);
    }

    private function CheckPosition($orientation = false)
    {
        if ($orientation == 'x' or $orientation == false)
            if ($this->agk->GetObjectX($this->objectId) != $this->x) $this->x = $this->agk->GetObjectX($this->objectId);
        if ($orientation == 'y' or $orientation == false)
            if ($this->agk->GetObjectY($this->objectId) != $this->y) $this->y = $this->agk->GetObjectX($this->objectId);
        if ($orientation == 'z' or $orientation == false)
            if ($this->agk->GetObjectZ($this->objectId) != $this->z) $this->z = $this->agk->GetObjectX($this->objectId);
    }




}