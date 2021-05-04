<?php


namespace MarbleUI\modules;


use fibonaccifox\AppGameKit;
use MarbleUI\modules\Objects3D\ObjectBox;
use MarbleUI\modules\Objects3D\Object3D;
use MarbleUI\modules\Objects3D\ObjectCapsule;
use MarbleUI\modules\Objects3D\ObjectCone;
use MarbleUI\modules\Objects3D\ObjectCylinder;
use MarbleUI\modules\Objects3D\ObjectModel;
use MarbleUI\modules\Objects3D\ObjectParticles;
use MarbleUI\modules\Objects3D\ObjectPlane;
use MarbleUI\modules\Objects3D\ObjectSphere;

/**
 * Класс контроллер 3D объектов
 *
 * @author  ElGenKa
 * @version 1.0.0;
 */
class Core3D
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

    /**
     * Получить первый объект из списка объектов по определенному тэгу
     *
     * @param $tag
     *
     * @return Object3D|mixed
     */
    public function GetObjectWidthTag($tag)
    {
        /**
         * @var Object3D $object
         */
        foreach ($this->objectList as $object) {
            if ($object->GetTag() == $tag) {
                return $object;
            }
        }
    }

    /**
     * Получить все объекты из списка объектов по определенному тэгу
     *
     * @param $tag
     *
     * @return array
     */
    public function GetObjectsWidthTag($tag)
    {
        $objectList = [];
        /**
         * @var Object3D $object
         */
        foreach ($this->objectList as $object) {
            if ($object->GetTag() == $tag) {
                $objectList[] = $object;
            }
        }
        return $objectList;
    }

    /**
     * Создать коробку
     *
     * @param array $size размер (массив x,y,z)
     *
     * @return ObjectBox
     */
    public function CreateBox($size = [1, 1, 1])
    {
        $object = new ObjectBox($this->agk, $size);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    /**
     * Создать сферу
     *
     * @param int $diameter Диаметр сферы.
     * @param int $rows     Число рядов многоугольников, составляющих сферу.
     * @param int $columns  Число столбцов многоугольников, составляющих сферу.
     *
     * @return ObjectSphere
     */
    public function CreateSphere($diameter = 1, $rows = 10, $columns = 10)
    {
        $object = new ObjectSphere($this->agk, $diameter, $rows, $columns);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    public function CreateQuad()
    {

    }

    public function CreatePlane($width = 1, $height = 1)
    {
        $object = new ObjectPlane($this->agk, $width, $height);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    public function CreateHeightMap()
    {

    }

    /**
     * Создает конус
     *
     * @param int $height   Высота конуса.
     * @param int $diameter Диаметр основания конуса.
     * @param int $segments Количество столбцов многоугольников, составляющих конус.
     *
     * @return ObjectCone
     */
    public function CreateCone($height = 1, $diameter = 1, $segments = 10)
    {
        $object = new ObjectCone($this->agk, $height, $diameter, $segments);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    /**
     * @param int $diameter Диаметр капсулы.
     * @param int $height   Высота капсулы
     * @param int $axis     Направление - 0 = X, 1 = Y, Z = 2
     *
     * @return ObjectCapsule
     */
    public function CreateCapsule($diameter = 1, $height = 1, $axis = 0)
    {
        $object = new ObjectCapsule($this->agk, $diameter, $height, $axis);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    /**
     * @param int $height   Высота цилиндра.
     * @param int $diameter Диаметр основания цилиндра.
     * @param int $segments Число столбцов многоугольников, составляющих цилиндр.
     *
     * @return ObjectCylinder
     */
    public function CreateCylinder($height = 1, $diameter = 1, $segments = 10)
    {
        $object = new ObjectCylinder($this->agk, $height, $diameter, $segments);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    /**
     * Загружает объект из файла, в настоящее время поддерживаются форматы .X .3ds .md3 .smd .md5 .lwo. ac .b3d .dae
     * .3d .lws .ms3d .blend .m3 .obj и .ago. Эта команда не будет загружать никаких анимационных или костных данных и
     * объединит вершины в один объект с как можно меньшим количеством сеток. Для загрузки анимации и костных данных
     * используйте вместо этого LoadObjectWithChildren.
     *
     * @param     $file
     * @param int $height
     *
     * @return ObjectModel
     */
    public function LoadSimpleObject($file, $height = 1)
    {
        $object = new ObjectModel($this->agk, $file, $height = 1);
        $this->objectList[$object->objectId] = $object;
        return $object;
    }

    /**
     * Создает генератор частиц
     *
     * @param array|int[] $position
     *
     * @return ObjectParticles
     */
    public function CreateParticle($position)
    {
        //var_dump($position);
        $particle = new ObjectParticles($this->agk, $this, $position);
        $this->particlesList[$particle->objectId] = $particle;
        return $particle;
    }

    /**
     * Обновляет положение (излучателей) привязанных частиц к объектам
     */
    public function ParticlesSync()
    {
        /** @var ObjectParticles $particle */
        foreach ($this->particlesList as $particle) {
            if( $particle->IsFixed() and !$particle->isFree() ){
                /** @var Object3D $fixedObject */
                $fixedObject = $particle->GetFixedObject();
                $offset = $fixedObject->GetWorldPosition();
                //var_dump($offset);
                $x = $offset[0] + $particle->GetFixOffsetX();
                $y = $offset[1] + $particle->GetFixOffsetY();
                $z = $offset[2] + $particle->GetFixOffsetZ();
                $particle->SetPosition([$x, $y, $z]);
                //var_dump($fixedObject->objectId);
            }
        }
    }

}