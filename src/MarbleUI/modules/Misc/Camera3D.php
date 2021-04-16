<?php


namespace MarbleUI\modules\Misc;


use fibonaccifox\AppGameKit;

/**
 * Класс управления камерой
 *
 * Class Camera3D
 *
 * @package MarbleUI\modules\Misc\Camera3D
 *
 * @author  ElGenKa
 * @version 1.0.0;
 */
class Camera3D
{

    /**
     * @var AppGameKit
     */
    public AppGameKit $AppGameKit;
    /**
     * @var int
     */
    private $DefaultCameraID = 1;

    /**
     * Camera3D constructor.
     *
     * @param AppGameKit $AppGameKit
     */
    public function __construct(AppGameKit $AppGameKit)
    {
        $this->AppGameKit = $AppGameKit;
    }

    /**
     * Получить позицию по X камеры
     *
     * @return float
     */
    public function GetX()
    {
        return $this->AppGameKit->GetCameraX($this->DefaultCameraID);
    }

    /**
     * Получить позицию по Y камеры
     *
     * @return float
     */
    public function GetY()
    {
        return $this->AppGameKit->GetCameraY($this->DefaultCameraID);
    }

    /**
     * Получить позицию по Z камеры
     *
     * @return float
     */
    public function GetZ()
    {
        return $this->AppGameKit->GetCameraZ($this->DefaultCameraID);
    }

    /**
     * Получить глобальную позицию камеры по X
     *
     * @return float
     */
    public function GetGlobalX()
    {
        return $this->AppGameKit->GetCameraWorldX($this->DefaultCameraID);
    }

    /**
     * Получить глобальную позицию камеры по Y
     *
     * @return float
     */
    public function GetGlobalY()
    {
        return $this->AppGameKit->GetCameraWorldY($this->DefaultCameraID);
    }

    /**
     * Получить глобальную позицию камеры по Z
     *
     * @return float
     */
    public function GetGlobalZ()
    {
        return $this->AppGameKit->GetCameraWorldZ($this->DefaultCameraID);
    }

    /**
     * Получить угол камеры по X
     *
     * @return float
     */
    public function GetAngleX()
    {
        return $this->AppGameKit->GetCameraAngleX($this->DefaultCameraID);
    }

    /**
     * Получить угол камеры по Y
     *
     * @return float
     */
    public function GetAngleY()
    {
        return $this->AppGameKit->GetCameraAngleY($this->DefaultCameraID);
    }

    /**
     * Получить угол камеры по Z
     *
     * @return float
     */
    public function GetAngleZ()
    {
        return $this->AppGameKit->GetCameraAngleZ($this->DefaultCameraID);
    }

    /**
     * Здвинуть камеру по X
     *
     * @param float $amount
     */
    public function MoveX(float $amount)
    {
        $this->AppGameKit->MoveCameraLocalX($this->DefaultCameraID, $amount);
    }

    /**
     * Здвинуть камеру по Y
     *
     * @param float $amount
     */
    public function MoveY(float $amount)
    {
        $this->AppGameKit->MoveCameraLocalY($this->DefaultCameraID, $amount);
    }

    /**
     * Здвинуть камеру по Z
     *
     * @param float $amount
     */
    public function MoveZ(float $amount)
    {
        $this->AppGameKit->MoveCameraLocalZ($this->DefaultCameraID, $amount);
    }

    /**
     * Зафикисровать камеру на объекте. Камера будет перемещаться и крутиться вместе с этим объектом
     *
     * @param int $objectId
     */
    public function FixToObject(int $objectId)
    {
        $this->AppGameKit->FixCameraToObject($this->DefaultCameraID, $objectId);
    }

    /**
     * Установить позицию камеры
     *
     * @param array $position
     */
    public function SetPosition(array $position)
    {
        $this->AppGameKit->SetCameraPosition($this->DefaultCameraID, $position[0], $position[1], $position[2]);
    }

    /**
     * Установить позицию камеры по X
     *
     * @param $x
     */
    public function SetX($x)
    {
        $this->AppGameKit->SetCameraPosition($this->DefaultCameraID, $x, $this->GetY(), $this->GetZ());
    }

    /**
     * Установить позицию камеры по Y
     *
     * @param $y
     */
    public function SetY($y)
    {
        $this->AppGameKit->SetCameraPosition($this->DefaultCameraID, $this->GetX(), $y, $this->GetZ());
    }

    /**
     * Установить позицию камеры по Z
     *
     * @param $z
     */
    public function SetZ($z)
    {
        $this->AppGameKit->SetCameraPosition($this->DefaultCameraID, $this->GetX(), $this->GetY(), $z);
    }

    /**
     * Задать поворот камеры
     *
     * @param array $rotation
     */
    public function SetRotation(array $rotation)
    {
        $this->AppGameKit->SetCameraRotation($this->DefaultCameraID, $rotation[0], $rotation[1], $rotation[2]);
    }

    /**
     * Устанавливает ближнюю и дальнюю плоскости камеры. Из-за ограничений рендеринга не все перед камерой может быть
     * рендерено, поэтому они должны быть ограничены видимым диапазоном. Все, что находится за пределами этого
     * диапазона, отсекается системой рендеринга и остается невидимым. Ближняя плоскость-это самое близкое, что объект
     * может быть к камере и все еще визуализироваться, она должна быть больше 0. Обратите внимание, что использование
     * очень малых значений для ближней плоскости повлияет на точность буфера глубины при рендеринге объектов вдали,
     * что может вызвать мерцание на удаленных объектах. Это происходит потому, что буфер глубины не является линейным,
     * вместо этого он смещен в сторону ближней плоскости, и чем ближе к 0 становится ближняя плоскость, тем меньше
     * буфера глубины доступно для дальних объектов. Дальняя плоскость-это максимальное расстояние, на котором объект
     * может находиться от камеры и все еще визуализироваться, его максимальное значение равно бесконечности, но опять
     * же, чем дальше вы пытаетесь визуализировать объект от ближней плоскости, тем менее точной становится буферизация
     * глубины. Если объект пересекает ближнюю или дальнюю плоскость так, что часть его находится с одной стороны, а
     * часть-с другой, то объект будет разрезан плоскостью, и будет видна только часть в пределах диапазона обзора.
     * Диапазон по умолчанию-near=1, far=1000.
     *
     * @param float $fNear Самое близкое, что объект будет визуализирован.
     * @param float $fFar  Самое дальнее, что объект будет визуализирован.
     */
    public function SetRange(float $fNear, float $fFar)
    {
        $this->AppGameKit->SetCameraRange($this->DefaultCameraID, $fNear, $fFar);
    }

    /**
     * Поворачивает камеру, чтобы посмотреть на определенную точку в пространстве с дополнительным значением крена.
     * смотреть определяется как выравнивание локальной оси Z камеры, чтобы указать ее положительную сторону в данной
     * точке. Это может быть достигнуто с помощью только углов Y и X в эйлеровой нотации, поэтому вы можете указать
     * дополнительный угол Z в градусах, чтобы повернуть камеру влево или вправо, всегда глядя на одно и то же место.
     *
     * @param float $x    X-компонент позиции, на которую нужно смотреть.
     * @param float $y    Y-компонент позиции, на которую нужно смотреть.
     * @param float $z    Z-компонент позиции, на которую нужно смотреть.
     * @param float $roll Угол Z для поворота камеры при взгляде на заданное положение отрицательный-по часовой стрелке.
     */
    public function LockAt(float $x, float $y, float $z, float $roll)
    {
        $this->AppGameKit->SetCameraLookAt($this->DefaultCameraID, $x, $y, $z, $roll);
    }

    /**
     * Устанавливает горизонтальное поле зрения камеры (FOV). Это определяет угол между левой и правой сторонами обзора
     * камеры, по умолчанию равный 70, и обеспечивает реалистичную 3D-проекцию. Использование меньших значений будет
     * выглядеть так, как будто камера увеличивает масштаб сцены, фактически не двигаясь. Это иногда используется для
     * драматического эффекта в фильмах, где FOV масштабируется в одну сторону, в то время как камера движется в
     * другую. Использование значения FOV 0-это особый случай, который будет генерировать ортогональную матрицу вместо
     * проекционной матрицы, это заставит все оставаться одного и того же размера независимо от того, насколько близко
     * или далеко оно находится к камере. Ортогональная матрица будет иметь ширину 40 мировых единиц с высотой,
     * определяемой соотношением сторон камеры.
     *
     * @param float $fov Поле зрения в градусах.
     */
    public function SetFov(float $fov)
    {
        $this->AppGameKit->SetCameraFOV($this->DefaultCameraID, $fov);
    }

    /**
     * Вращает указанную камеру вокруг своей локальной оси X, то есть если бы камера была самолетом, эта команда
     * заставила бы ее наклоняться вверх и вниз независимо от того, в каком направлении она обращена.
     *
     * @param float $amount Угол поворота по локальной оси X в градусах, положительный смотрит вниз, отрицательный
     *                      смотрит вверх.
     */
    public function RotateX(float $amount)
    {
        $this->AppGameKit->RotateCameraLocalX($this->DefaultCameraID, $amount);
    }

    /**
     * Вращает указанную камеру вокруг своей локальной оси Y, то есть если бы камера была самолетом, эта команда
     * заставила бы ее поворачиваться влево и вправо независимо от того, в каком направлении она обращена.
     *
     * @param float $amount Угол поворота по локальной оси Y в градусах, положительный поворот вправо, отрицательный
     *                      поворот влево.
     */
    public function RotateY(float $amount)
    {
        $this->AppGameKit->RotateCameraLocalX($this->DefaultCameraID, $amount);
    }

    /**
     * Вращает указанную камеру вокруг своей локальной оси Z, то есть если бы камера была самолетом, эта команда
     * заставила бы ее катиться влево и вправо независимо от того, в каком направлении она была обращена.
     *
     * @param float $amount Угол поворота по локальной оси Z в градусах, отрицательный-по часовой стрелке.
     */
    public function RotateZ(float $amount)
    {
        $this->AppGameKit->RotateCameraLocalX($this->DefaultCameraID, $amount);
    }

    /**
     * Вращает указанную камеру вокруг глобальной оси X. Представьте себе, что вы смотрите на камеру, как если бы это
     * был объект, расположенный на 0,0,0 и смотрящий в случайном направлении. Эта команда будет вращать его вокруг
     * фиксированной оси X, которая используется для определения положения всего в мире.
     *
     * @param float $amount Угол поворота на глобальной оси X в градусах, положительный шаг вниз, отрицательный шаг
     *                      вверх.
     */
    public function RotateGlobalX(float $amount)
    {
        $this->AppGameKit->RotateCameraGlobalX($this->DefaultCameraID, $amount);
    }

    /**
     * Вращает указанную камеру вокруг глобальной оси Y. Представьте себе, что вы смотрите на камеру, как если бы это
     * был объект, расположенный на 0,0,0 и смотрящий в случайном направлении. Эта команда повернет его вокруг
     * неподвижной оси Y, той, которая используется для определения положения всего в мире.
     *
     * @param float $amount Угол поворота по глобальной оси Y в градусах, положительный поворот вправо, отрицательный
     *                      поворот влево.
     */
    public function RotateGlobalY(float $amount)
    {
        $this->AppGameKit->RotateCameraGlobalY($this->DefaultCameraID, $amount);
    }

    /**
     * Вращает указанную камеру вокруг глобальной оси Z. Представьте себе, что вы смотрите на камеру, как если бы это
     * был объект, расположенный на 0,0,0 и смотрящий в случайном направлении. Эта команда будет вращать его вокруг
     * фиксированной оси Z, которая используется для определения положения всего в мире.
     *
     * @param float $amount Угол поворота на глобальной оси Z в градусах, отрицательный-по часовой стрелке.
     */
    public function RotateGlobalZ(float $amount)
    {
        $this->AppGameKit->RotateCameraGlobalZ($this->DefaultCameraID, $amount);
    }

    //public function MoveGlobalZ(float $amount){
    //    $this->AppGameKit->($this->DefaultCameraID, $amount);
    //}

}