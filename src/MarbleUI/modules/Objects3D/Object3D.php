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

    private float $scale_x = 1;
    private float $scale_y = 1;
    private float $scale_z = 1;

    private $Tag;

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
        $this->scale_x = $scale[0];
        $this->scale_y = $scale[1];
        $this->scale_z = $scale[2];
        $this->agk->SetObjectScale($this->objectId, $scale[0], $scale[1], $scale[2]);
    }

    /**
     * Изменят размер по X
     *
     * @param float $scaleX
     */
    public function SetScaleX(float $scaleX)
    {
        $this->scale_x = $scaleX;
        $this->SetScale([$this->scale_x, $this->scale_y, $this->scale_z]);
    }

    /**
     * Изменят размер по Y
     *
     * @param float $scaleY
     */
    public function SetScaleY(float $scaleY)
    {
        $this->scale_y = $scaleY;
        $this->SetScale([$this->scale_x, $this->scale_y, $this->scale_z]);
    }

    /**
     * Изменят размер по Z
     *
     * @param float $scaleZ
     */
    public function SetScaleZ(float $scaleZ)
    {
        $this->scale_z = $scaleZ;
        $this->SetScale([$this->scale_x, $this->scale_y, $this->scale_z]);
    }

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
     * Возвращает текущее X-положение объекта в мировых координатах. Это учитывает родительские позиции в результате
     * FixObjectToObject или FixObjectToBone и возвращает абсолютное мировое положение объекта.
     *
     * @return float
     */
    public function GetWorldX()
    {
        return $this->agk->GetObjectWorldX($this->objectId);
    }

    /**
     * Возвращает текущее Y-положение объекта в мировых координатах. Это учитывает родительские позиции в результате
     * FixObjectToObject или FixObjectToBone и возвращает абсолютное мировое положение объекта.
     *
     * @return float
     */
    public function GetWorldY()
    {
        return $this->agk->GetObjectWorldY($this->objectId);
    }

    /**
     * Возвращает текущее Z-положение объекта в мировых координатах. Это учитывает родительские позиции в результате
     * FixObjectToObject или FixObjectToBone и возвращает абсолютное мировое положение объекта.
     *
     * @return float
     */
    public function GetWorldZ()
    {
        return $this->agk->GetObjectWorldZ($this->objectId);
    }

    /**
     * Возвращает текущее положение [X, Y, Z] объекта в мировых координатах. Это учитывает родительские позиции в результате
     * FixObjectToObject или FixObjectToBone и возвращает абсолютное мировое положение объекта.
     *
     * @return array [x, y, z]
     */
    public function GetWorldPosition()
    {
        return [
            $this->agk->GetObjectWorldX($this->objectId),
            $this->agk->GetObjectWorldY($this->objectId),
            $this->agk->GetObjectWorldZ($this->objectId)
        ];
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

    /**
     * Прикрепит объект к другому объекту (объект на котором выполняется данный метод станет дочерним)
     *
     * @param int $objectID id Объекта к которому крепимся
     */
    public function FixToObject(int $objectID)
    {
        $this->agk->FixObjectToObject($this->objectId, $objectID);
    }

    /**
     * Аналогично FixObjectToObject, за исключением того, что родитель будет костью в другом объекте.
     *
     * @param int $objectID
     * @param int $boneID
     */
    public function FixToBone(int $objectID, int $boneID)
    {
        $this->agk->FixObjectToBone($this->objectId, $objectID, $boneID);
    }

    /**
     * Устанавливает все сетки в этом объекте для использования этого изображения при рендеринге. Вы можете установить
     * текстуры отдельно для каждой сетки с помощью SetObjectMeshImage. Каждая сетка может иметь до 8 изображений,
     * назначенных ей на этапах текстуры от 0 до 7. Если вы не уверены, какой этап текстуры использовать, поместите
     * изображение в этап 0. Стадии текстуры можно использовать для назначения нескольких изображений сетке, например,
     * вы можете поместить базовую (диффузную) текстуру в стадию 0, нормальную карту в стадию 1 и световую карту в
     * стадию 2. Шейдер, используемый для рисования этого объекта, может затем объединить различные текстуры в
     * пиксельное значение для отображения на экране. Использование значения изображения 0 для определенного этапа
     * текстуры удаляет любое назначенное изображение с этого этапа.
     *
     * @param int $imageID  Идентификатор изображения
     * @param int $texStage Этап текстуры, используемый для этого изображения.
     */
    public function SetImage(int $imageID, int $texStage = 0)
    {
        $this->agk->SetObjectImage($this->objectId, $imageID, $texStage);
    }

    /**
     * Устанавливает все сетки в этом объекте для использования указанного изображения в качестве световой карты. Вы
     * можете установить световую карту для одной сетки с помощью SetObjectMeshLightMap. Световая карта будет помещена
     * в текстурную стадию 1, перезаписывая все, что уже есть, и будет сгенерирован шейдер, который объединит ее с
     * текстурной стадией 0 и любым динамическим освещением, чтобы правильно осветить объект. Если вы устанавливаете
     * свой собственный шейдер с помощью SetObjectShader, то ваш шейдер должен будет использовать саму световую карту,
     * так как AGK не будет изменять ваш шейдер таким образом. Световая карта будет использовать второй набор
     * УФ-координат, если он доступен, в противном случае она будет использовать те же УФ-координаты, что и базовая
     * текстура.
     *
     * @param $imageID Идентификатор изображения
     */
    public function SetLightMap(int $imageID)
    {
        $this->agk->SetObjectLightMap($this->objectId, $imageID);
    }

    /**
     * Включает или выключает туман при рисовании этого объекта. По умолчанию все объекты получают туман, когда он
     * включен с помощью SetFogMode
     *
     * @param int $mode 0, чтобы выключить туман, 1, чтобы включить его.
     */
    public function SetFogMode(int $mode)
    {
        $this->agk->SetObjectFogMode($this->objectId, $mode);
    }

    /**
     * Устанавливает, является ли этот объект видимым или нет. Он по-прежнему будет участвовать в столкновениях и других невизуальных взаимодействиях.
     *
     * @param bool $visible 1, чтобы сделать этот объект видимым, 0, чтобы скрыть его.
     */
    public function SetVisible(bool $visible){
        $this->agk->SetObjectVisible($this->objectId, $visible);
    }

    /**
     * Возвращает текущий режим видимости для этого объекта
     *
     * @return int
     */
    public function GetVisible(){
        return $this->agk->GetObjectVisible($this->objectId);
    }

    /**
     * Устанавливает тэг объекта
     *
     * @param $tag
     */
    public function SetTag($tag){
        $this->Tag = $tag;
    }

    /**
     * Возвращает тэг объекта
     *
     * @return mixed
     */
    public function GetTag(){
        return $this->Tag;
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
            if ($this->agk->GetObjectY($this->objectId) != $this->y) $this->y = $this->agk->GetObjectY($this->objectId);
        if ($orientation == 'z' or $orientation == false)
            if ($this->agk->GetObjectZ($this->objectId) != $this->z) $this->z = $this->agk->GetObjectZ($this->objectId);
    }

}