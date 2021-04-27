<?php


namespace MarbleUI\modules\Objects3D;

use fibonaccifox\AppGameKit;
use MarbleUI\modules\BaseObject;
use MarbleUI\modules\Core3D;

class ObjectParticles extends BaseObject
{
    private bool $softDelete;
    private bool $Tag;
    private bool $fixed;
    private object $fixedObject;
    private Core3D $core3D;

    private float $FixOffsetX;
    private float $FixOffsetY;
    private float $FixOffsetZ;


    public function __construct(AppGameKit $agk, Core3D $core3D, $position = [0, 0, 0])
    {
        $objectID = $agk->Create3DParticles($position[0], $position[1], $position[2]);
        var_dump($objectID);
        $this->objectId = $objectID;
        $this->softDelete = false;
        $this->core3D = $core3D;
        parent::__construct($agk);
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

    /**
     * Возвращает тэг объекта
     *
     * @return mixed
     */
    public function GetTag(): mixed
    {
        return $this->Tag;
    }

    /**
     * @param int|object $object
     */
    public function FixToObject(int|object $object)
    {
        if (is_int($object)) {
            $object = $this->core3D->objectList[$object];
        }
        $this->fixedObject = $object;
        $this->fixed = true;
    }

    public function SetFixOffsetX(float $amount)
    {
        $this->FixOffsetX = $amount;
    }

    public function GetFixOffsetX(): float
    {
        return $this->FixOffsetX;
    }

    public function SetFixOffsetY(float $amount)
    {
        $this->FixOffsetY = $amount;
    }

    public function GetFixOffsetY(): float
    {
        return $this->FixOffsetY;
    }

    public function SetFixOffsetZ(float $amount)
    {
        $this->FixOffsetZ = $amount;
    }

    public function GetFixOffsetZ(): float
    {
        return $this->FixOffsetZ;
    }

    /**
     * Возвращает зафиксирован излучатель на объекте
     *
     * @return bool
     */
    public function IsFixed(): bool
    {
        return $this->fixed;
    }

    /**
     * @return object
     */
    public function GetFixedObject(): object
    {
        return $this->fixedObject;
    }

    /**
     * Устанавливает, рисуются ли испускаемые частицы. Установите значение 1, чтобы показать частицы, и 0, чтобы скрыть
     * их. Частицы все равно будут обновляться, пока они скрыты, вы можете остановить обновление частиц с помощью
     * SetActive
     *
     * @param bool $visible 1=показать, 0=скрыть
     */
    public function SetVisible(bool $visible)
    {
        $this->agk->Set3DParticlesVisible($this->objectId, $visible);
    }

    /**
     * Устанавливает, обновляются ли испускаемые частицы каждый кадр. Установите значение 1, чтобы обновить частицы как
     * обычно, и 0, чтобы приостановить их. Частицы будут продолжать быть видимыми, когда остановятся. Чтобы скрыть
     * частицы, используйте SetVisible.
     *
     * @param bool $avtive
     */
    public function SetActive(bool $avtive)
    {
        $this->agk->Set3DParticlesActive($this->objectId, $avtive);
    }

    /**
     * Устанавливает минимальный и максимальный множитель, который будет влиять на испускаемые частицы. Это может быть
     * использовано для обеспечения некоторого изменения скорости при испускании частиц.
     *
     * @param float $v1 Минимальный множитель скорости.
     * @param float $v2 Множитель максимальной скорости.
     */
    public function VelocityRange(float $v1, float $v2)
    {
        $this->agk->Set3DParticlesVelocityRange($this->objectId, $v1, $v2);
    }

    /**
     * Установите прозрачность частиц на определенную настройку с выбором без прозрачности, альфа-прозрачности и
     * аддитивного смешивания. По умолчанию частицы создаются с альфа-прозрачностью.
     *
     * @param int $mode 0=выкл., 1=альфа-прозрачность, 2=аддитивное смешивание
     */
    public function SetTransparency(int $mode)
    {
        $this->agk->Set3DParticlesTransparency($this->objectId, $mode);
    }

    /**
     * Задает область вокруг излучателя, в которой могут появиться новые частицы. Эти значения относятся к положению
     * эмиттера, например, зона 0,0,0,0 будет означать, что все частицы начинаются в точке положения эмиттера. Зона -10
     * в x и +10 x, где y и z равны 0 (-10,0,0,10,0,0), создаст линию, центрированную на положении излучателя, вдоль
     * которой будут случайным образом появляться частицы. Зона коробки, где x, y и z не равны нулю, означала бы, что
     * частицы могут начинаться в любой точке внутри коробки.
     *
     * @param float $x1 Координата x верхнего левого угла стартовой зоны.
     * @param float $y1 Координата y верхнего левого угла стартовой зоны.
     * @param float $z1 z-координата верхнего левого угла стартовой зоны.
     * @param float $x2 Координата x в правом нижнем углу стартовой зоны.
     * @param float $y2 Координата y в правом нижнем углу стартовой зоны.
     * @param float $z2 Координата z в правом нижнем углу стартовой зоны.
     */
    public function SetStartZone(float $x1, float $y1, float $z1, float $x2, float $y2, float $z2)
    {
        $this->agk->Set3DParticlesStartZone($this->objectId, $x1, $y1, $z1, $x2, $y2, $z2);
    }

    /**
     * Задает размер всех частиц в мировых координатах. Установка большого количества частиц на большой размер будет
     * плохо работать на мобильных устройствах с низкой скоростью заполнения (количество пикселей, которые он может
     * нарисовать в секунду).
     *
     * @param float $size Размер частиц
     */
    public function SetSize(float $size)
    {
        $this->agk->Set3DParticlesSize($this->objectId, $size);
    }

    /**
     * Устанавливает положение 3D-излучателя частиц. Это положение, из которого будут появляться новые частицы, и не
     * влияет на частицы, которые уже видны
     *
     * @param array $pos
     */
    public function SetPosition(array $pos)
    {
        $this->agk->Set3DParticlesPosition($this->objectId, $pos[0], $pos[1], $pos[2]);
    }

    /**
     * Устанавливает максимальное количество частиц, которые будут испускаться. Если это значение равно -1, то число
     * бесконечно. Излучатель будет вести подсчет общего количества частиц, которые он испускает, и остановится, когда
     * будет достигнут предел. Чтобы проверить, достиг ли излучатель своего предела, используйте
     * GetParticlesMaxReached. Чтобы сбросить счетчик и заставить его снова начать излучать, используйте
     * ResetParticleCount.
     *
     * @param int $max Максимальное количество испускаемых частиц
     */
    public function SetParticlesMax(int $max)
    {
        $this->agk->Set3DParticlesMax($this->objectId, $max);
    }

    /**
     * Устанавливает время жизни частиц в секундах после их испускания. После того, как частицы будут живы в течение
     * заданного количества секунд, они исчезнут. Это одно из двух значений, влияющих на количество генерируемых
     * частиц, другое-SetFrequency. Максимальное количество частиц, которое может быть на экране в любой
     * момент времени, - это freq*life, причем freq-это количество частиц, испускаемых в секунду. Это значение не
     * зависит от частоты кадров.
     *
     * @param float $time Время в секундах, в течение которого частица видна.
     */
    public function SetLife(float $time)
    {
        $this->agk->Set3DParticlesLife($this->objectId, $time);
    }

    /**
     * Устанавливает изображение, которое будет использоваться для каждой частицы.
     *
     * @param int $imageID Идентификатор изображения, используемого для испускаемых частиц.
     */
    public function SetImage(int $imageID)
    {
        $this->agk->Set3DParticlesImage($this->objectId, $imageID);
    }

    /**
     * Задает частоту генерации новых частиц. Значение freq указывает, сколько частиц должно быть произведено в
     * секунду, это не зависит от частоты кадров. Это одно из двух значений, влияющих на количество генерируемых
     * частиц, другое-SetLife. Максимальное количество частиц, которое может быть на экране в любой момент
     * времени, - это freq*life, причем жизнь-это количество секунд, в течение которых частица живет, прежде чем
     * исчезнуть.
     *
     * @param float $freq Скорость образования новых частиц в частицах в секунду.
     */
    public function SetFrequency(float $freq)
    {
        $this->agk->Set3DParticlesFrequency($this->objectId, $freq);
    }

    /**
     * Задает диапазон направления в градусах, который частица может выбрать при первом запуске. Это берет базовое
     * направление, заданное с помощью Set3DParticlesDirection, и регулирует его на случайную величину между 0 и углом
     * 1/2 градуса в одном направлении и углом 2/2 градуса в перпендикулярном направлении. Например, угол 1, равный 0,
     * и угол 2, равный 0, означают, что все новые частицы следуют точно в указанном ранее направлении. Угол 1, равный
     * 360, и угол 2, равный 0, означали бы, что частицы могут двигаться в любом направлении по плоскому кругу, в то
     * время как угол 1, равный 360, и угол 2, равный 180, означали бы, что частицы будут двигаться в любом направлении
     * по сфере. Углы образуют пирамиду, выровненную с направлением излучателя частиц, указанным ранее. Угол 1 должен
     * быть между 0 и 360, угол 2 должен быть между 0 и 180.
     *
     * @param float $angle1 Диапазон изменения, который частица может выбрать из направления излучателя.
     * @param float $angle2 Перпендикулярный диапазон изменения, который частица может выбрать из направления
     *                      излучателя.
     */
    public function SetDirectionRange(float $angle1, float $angle2)
    {
        $this->agk->Set3DParticlesDirectionRange($this->objectId, $angle1, $angle2);
    }

    /**
     * Задает начальное направление новых частиц, когда они выходят из излучателя. Это можно использовать вместе с
     * командой Set3DParticlesDirectionRange, чтобы установить диапазон отклонения от этого начального направления,
     * которое могут выбрать новые частицы. Это также устанавливает начальную скорость частиц, принимая длину вектора
     * за единицы в секунду. Например, если начальное направление vx=10, vy=-15, vz=0, частицы начнут двигаться в
     * направлении X со скоростью 10 единиц в секунду и в направлении Y со скоростью 15 единиц в секунду и будут
     * продолжать эту скорость движения в течение всей своей жизни, если на них не будут влиять силы, добавленные с
     * помощью Add3DParticlesForce.
     *
     * @param float $vx   Направление x, в котором частицы будут двигаться изначально.
     * @param float $vy   Направление y, в котором частицы будут двигаться изначально.
     * @param float $vz   Направление z, в котором частицы будут двигаться изначально.
     * @param float $roll Угол поворота излучателя в заданном направлении
     */
    public function SetDirection(float $vx, float $vy, float $vz, float $roll)
    {
        $this->agk->Set3DParticlesDirection($this->objectId, $vx, $vy, $vz, $roll);
    }

    /**
     * Устанавливает режим интерполяции для изменения цвета. Цвета могут быть установлены в определенные моменты жизни
     * частицы с помощью AddColorKeyFrame, и частица либо смешается между этими цветами (плавная
     * интерполяция), либо быстро изменится, когда достигнет следующего изменения цвета (без интерполяции).
     *
     * @param int $mode 1=плавная интерполяция, 0=отсутствие интерполяции
     */
    public function SetColorInterpolation(int $mode)
    {
        $this->agk->Set3DParticlesColorInterpolation($this->objectId, $mode);
    }

    /**
     * Добавляет изменение цвета в определенный момент жизни частицы. Например, цвет, добавленный со временем=1,
     * сделает частицу равной данному цвету, когда она была жива в течение 1 секунды. Если цветовая интерполяция
     * включена с помощью SetColorInterpolation, частица постепенно преобразуется из своего текущего цвета в
     * следующий. Например, если вы добавите три цвета: красный, когда время=1, зеленый, когда время=2, и синий, когда
     * время=3, то частица начнет свою жизнь как красный (поскольку это ближайший цвет) и останется полностью красной,
     * пока ей не исполнится 1 секунда. Когда частице от 1 до 2 секунд, она будет постепенно меняться с красного на
     * зеленый, пока ей не исполнится 2 секунды, в этот момент она полностью зеленая. Когда частице от 2 до 3 секунд,
     * она будет постепенно меняться от зеленого до синего, пока ей не исполнится 3 секунды, в этот момент она
     * полностью синяя. Частица останется полностью синей до конца своей жизни, так как никакие другие цвета не были
     * добавлены.
     *
     * @param float $time  Время, когда частицы должны стать такого цвета.
     * @param int   $red   Красная составляющая нового цвета.
     * @param int   $green Зеленая составляющая нового цвета.
     * @param int   $blue  Синий компонент нового цвета.
     * @param int   $alpha Альфа-компонент нового цвета.
     */
    public function AddColorKeyFrame(float $time, int $red, int $green, int $blue, int $alpha = 255)
    {
        $this->agk->Add3DParticlesColorKeyFrame($this->objectId, $red, $green, $blue, $alpha);
    }

    /**
     * Добавляет изменение размера в определенный момент жизни частицы. Значения шкалы относятся к значению, заданному
     * SetSize, поэтому шкала 2 означает удвоение ее нормального размера, а 0,5-половину ее нормального
     * размера. Масштаб, добавленный со временем=1, заставит частицу постепенно трансформироваться в заданную, пока она
     * не будет жива в течение 1 секунды, когда она будет соответствовать заданному размеру. Затем частица постепенно
     * преобразуется из этого размера в следующий (если следующий размер существует).
     *
     * @param float $time Время, за которое частицы должны стать такого размера.
     * @param float $scale Масштаб относительно нормального размера частиц должен быть больше или равен 0.
     */
    public function AddScaleKeyFrame(float $time, float $scale)
    {
        $this->agk->Add3DParticlesScaleKeyFrame($this->objectId, $time, $scale);
    }

    /**
     * Сбрасывает количество испускаемых частиц, когда излучатель был установлен с максимальным количеством частиц с
     * помощью Set3DParticlesMax. Вы можете проверить, когда излучатель достиг своего максимального количества,
     * используя Get3DParticlesMaxReached. Если максимум установлен на -1, то эта команда не имеет никакого эффекта.
     */
    public function ResetParticleCount()
    {
        $this->agk->Reset3DParticleCount($this->objectId);
    }

    /**
     * Немедленно перемещает все существующие частицы на заданное смещение. Например, смещение x=3,y=5,z=0 сдвинет все
     * частицы вправо на 3 единицы и вниз на 5 единиц. Это не влияет на излучатель частиц, но может быть использовано в
     * сочетании с Set3DParticlesPosition для перемещения как излучателя, так и уже существующих частиц.
     *
     * @param float $x
     * @param float $y
     * @param float $z
     */
    public function OffsetParticles(float $x, float $y, float $z)
    {
        $this->agk->Offset3DParticles($this->objectId, $x, $y, $z);
    }

    /**
     * Возвращает текущее положение X излучателя, это точка, из которой будут появляться новые частицы. Невозможно
     * получить положение отдельных частиц, они просто создаются, следуют по пути под влиянием сил, а затем исчезают.
     *
     * @return float
     */
    public function GetX(): float
    {
        return $this->agk->Get3DParticlesX($this->objectId);
    }

    /**
     * Возвращает текущее Y - положение излучателя, это точка, из которой будут появляться новые частицы. Невозможно
     * получить положение отдельных частиц, они просто создаются, следуют по пути под влиянием сил, а затем исчезают.
     *
     * @return float
     */
    public function GetY(): float
    {
        return $this->agk->Get3DParticlesY($this->objectId);
    }

    /**
     * Возвращает текущее Z - положение излучателя, это точка, из которой будут появляться новые частицы. Невозможно
     * получить положение отдельных частиц, они просто создаются, следуют по пути под влиянием сил, а затем исчезают.
     *
     * @return float
     */
    public function GetZ(): float
    {
        return $this->agk->Get3DParticlesZ($this->objectId);
    }

    /**
     * @return array
     */
    public function GetPosition(): array
    {
        return [$this->GetX(), $this->GetY(), $this->GetZ()];
    }

    /**
     * Возвращает 0, если данные частицы были установлены как невидимые с помощью SetVisible, или 1, если
     * они в данный момент установлены как видимые (по умолчанию). Это не проверяет, находятся ли частицы в видимом
     * окне просмотра.
     *
     * @return int
     */
    public function IsVisible(): int
    {
        return $this->agk->Get3DParticlesVisible($this->objectId);
    }

    /**
     * Уничтожить объект
     */
    public function free()
    {
        $this->agk->Delete3DParticles($this->objectId);
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
}