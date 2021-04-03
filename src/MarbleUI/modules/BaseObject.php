<?php


namespace MarbleUI\modules;

/**
 * Class BaseObject
 ** EN: Agk base object.
 ** RU: Базовый объект AppGameKit.
 *
 * @property-read  int $objectId Уникальный идентификатор в AppGameKit.
 *
 * @package MarbleUI\Categories
 */
abstract class BaseObject
{
    /**
     * @var object Объект класса AppGameKit.
     */
    protected object $agk;

    /**
     * @var int Уникальный идентификатор в AppGameKit.
     */
    protected int $objectId;

    /**
     * BaseObject constructor.
     *
     * @param object $agk - объект класса AppGameKit.
     */
    public function __construct(object $agk)
    {
        $this->agk = $agk;
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        switch ($property) {
            case '$objectId':
                return $this->objectId;
                break;
        }
    }

    /**
     * @return void
     */
    abstract public function free();

    /**
     * Проверить, уничтожен ли объект.
     *
     * @return bool
     */
    abstract public function isFree(): bool;

}