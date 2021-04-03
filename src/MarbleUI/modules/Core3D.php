<?php


namespace MarbleUI\modules;


use fibonaccifox\AppGameKit;
use MarbleUI\modules\Objects3D\ObjectBox;

class Core3D
{
    /**
     * @var array $objectList
     */
    var $objectList;

    protected AppGameKit $agk;

    public function __construct(AppGameKit $agk)
    {
        $this->agk = $agk;
    }

    public function CreateBox()
    {
        $object = new ObjectBox($this->agk);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    public function CreateSphere()
    {

    }

    public function CreateQuad()
    {

    }

    public function CreatePlane()
    {

    }

    public function CreateHeightMap()
    {

    }

    public function CreateCone()
    {

    }

    public function CreateCapsule()
    {

    }

}