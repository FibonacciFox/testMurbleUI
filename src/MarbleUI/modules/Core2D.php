<?php


namespace MarbleUI\modules;

use fibonaccifox\AppGameKit;

use MarbleUI\modules\Objects2D\Object2D;
use MarbleUI\modules\Objects2D\ObjectText;
use MarbleUI\modules\Objects2D\ObjectVirtualButton;
use MarbleUI\modules\Objects2D\ObjectInput;
use MarbleUI\modules\Objects2D\ObjectVirtualJoystick;
use MarbleUI\modules\Objects2D\ObjectSprite;
use MarbleUI\modules\Objects2D\Object2DParticles;

class Core2D
{
    /**
     * Список всех созданных 3D объектов
     *
     * @var array $objectList
     */
    var $objectList;

    /**
     * Список всех созданных частиц
     *
     * @var array $particlesList
     */
    var $particlesList;

    protected AppGameKit $agk;

    /**
     * Core3D constructor.
     *
     * @param AppGameKit $agk
     */
    public function __construct(AppGameKit $agk)
    {
        $this->agk = $agk;
    }

    public function CreateText(){

    }

    public function CreateInput(){

    }

    public function CreateVirtualButton(){

    }

    public function CreateVirtualJoystick(){

    }

    public function CreateSprite(){

    }

    public function CreateParticle(){

    }
}