<?php

namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

/**
 * Class Text
 *
 * @property float $x        - X position of a text object in world coordinates.
 * @property float $y        - Y position of a text object in world coordinates.
 * @property float $z        - Z position of a text object in world coordinates.
 * @property array $position - Z position of a text object in world coordinates.
 * @property bool  $visible  - Z position of a text object in world coordinates.
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

    /**
     * Уничтожить объект
     */
    public function free()
    {
        $this->agk->DeleteObject($this->objectId);
        $this->softDelete = true;
    }

    /**
     * Уничтожен ли объект?
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->softDelete;
    }

    /**
     * сдвинуть объект по X
     *
     * @param float $x
     */
    public function MoveX(float $x)
    {
        $this->CheckPosition('x');
        $this->x += $x;
        $this->UpdatePosition();
    }

    /**
     * сдвинуть объект по Y
     *
     * @param float $y
     */
    public function MoveY(float $y)
    {
        $this->CheckPosition('y');
        $this->y += $y;
        $this->UpdatePosition();
    }

    /**
     * сдвинуть объект по Z
     *
     * @param float $z
     */
    public function MoveZ(float $z)
    {
        $this->CheckPosition('z');
        $this->z += $z;
        $this->UpdatePosition();
    }

    /**
     * установть объект по X
     *
     * @param float $x
     */
    public function SetX(float $x)
    {
        $this->CheckPosition('y');
        $this->CheckPosition('z');
        $this->x = $x;
        $this->UpdatePosition();
    }

    /**
     * установть объект по Y
     *
     * @param float $y
     */
    public function SetY(float $y)
    {
        $this->CheckPosition('x');
        $this->CheckPosition('z');
        $this->y = $y;
        $this->UpdatePosition();
    }

    /**
     * @param float $z установть объект по Z
     */
    public function SetZ(float $z)
    {
        $this->CheckPosition('x');
        $this->CheckPosition('y');
        $this->z = $z;
        $this->UpdatePosition();
    }


    /**
     * Установтиь объект по X,Y,Z
     *
     * @param array $position
     */
    public function SetPosition(array $position)
    {
        $this->x = $position[0];
        $this->y = $position[1];
        $this->z = $position[2];
        $this->UpdatePosition();
    }

    /**
     * Изменяет размер объекта в направлениях X, Y и Z. Значение масштаба 1,1,1 возвращает объект к его первоначальному
     * размеру, значение масштаба 2 делает объект вдвое больше, 0,5 - вдвое меньше и так далее.
     *
     * @param array $scale
     */
    public function SetScale(array $scale)
    {
        $this->agk->SetObjectScale($this->objectId, $scale[0], $scale[1], $scale[2]);
    }

    /*public function SetScaleX(array $scaleX){

    }

    public function SetScaleY(array $scaleY){

    }

    public function SetScaleZ(array $scaleZ){

    }*/

    /**
     * Получить позицию объекта по X
     *
     * @return float
     */
    public function GetX()
    {
        $this->CheckPosition('x');
        return $this->x;
    }

    /**
     * Получить позицию объекта по Y
     *
     * @return float
     */
    public function GetY()
    {
        $this->CheckPosition('y');
        return $this->y;
    }

    /**
     * Получить позицию объекта по Z
     *
     * @return float
     */
    public function GetZ()
    {
        $this->CheckPosition('z');
        return $this->z;
    }


    /**
     * Получить позицию объекта по X,Y,Z
     *
     * @return array
     */
    public function GetPosition()
    {
        $this->CheckPosition();
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