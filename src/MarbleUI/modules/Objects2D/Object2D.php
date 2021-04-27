<?php

namespace MarbleUI\modules\Objects2D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;

class Object2D extends BaseObject
{

    private $Tag;
    private float $x = 0;
    private float $y = 0;

    private float $scale_x = 1;
    private float $scale_y = 1;

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
     * Возвращает тэг объекта
     *
     * @return mixed
     */
    public function GetTag()
    {
        return $this->Tag;
    }

    /**
     * Устанавливает тэг объекта
     *
     * @param $tag
     */
    public function SetTag($tag)
    {
        $this->Tag = $tag;
    }
}