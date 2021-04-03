<?php


namespace MarbleUI\modules;

use fibonaccifox\AppGameKit;

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
     * @var AppGameKit Объект класса AppGameKit.
     */
    protected AppGameKit $agk;

    /**
     * @var int Уникальный идентификатор в AppGameKit.
     */
    private $objectId;

    private $_data;

    /**
     * BaseObject constructor.
     *
     * @param AppGameKit $agk - объект класса AppGameKit.
     */
    public function __construct(AppGameKit $agk)
    {
        $this->agk = $agk;
    }

    public function SetData($key, $value){
        $this->_data[$key] = $value;
    }

    public function GetData($key){
        return $this->_data[$key];
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        switch ($property) {
            case 'objectId':
                return $this->objectId;
                break;
        }
    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'objectId':
                $this->objectId = $value;
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