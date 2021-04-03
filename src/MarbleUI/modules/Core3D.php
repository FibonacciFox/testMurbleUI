<?php


namespace MarbleUI\modules;


use fibonaccifox\AppGameKit;
use MarbleUI\modules\Objects3D\ObjectBox;
use MarbleUI\modules\Objects3D\Object3D;


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

    public function GetObjectWidthTag($tag){
        /**
         * @var Object3D $object
         */
        foreach ($this->objectList as $object){
            if($object->Tag == $tag){
                return $object;
            }
        }
    }

    public function GetObjectsWidthTag($tag){
        $objectList = [];
        /**
         * @var Object3D $object
         */
        foreach ($this->objectList as $object){
            if($object->Tag == $tag){
                $objectList[] = $tag;
            }
        }
        return $objectList;
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