<?php


namespace MarbleUI\modules;

/**
 * Class Text
 *
 * @property string $text - String of a text object.
 * @property float $size - Size of the text object.
 * @property array $position - Position of a text object in world coordinates.
 * @property float $x - X position of a text object in world coordinates.
 * @property float $y - Y position of a text object in world coordinates.
 * @property float $colorAlpha  -  Set the alpha component of the text color. The value should be in the range 0-255.
 * @property int $colorBlue  -  Blue component of the text color. The value should be in the range 0-255.
 * @property int $colorGreen   -  Green component of the text color. The value should be in the range 0-255.
 * @property int $colorRed  -  Red component of the text color. The value should be in the range 0-255.
 * @property int $rotate  -  Angle of rotation. Rotation angle(from 0 to 360).
 * @property int $alignment - Text alignment. 0=left, 1=center, 2=right
 * @package MarbleUI\modules
 */
class Text extends BaseObject
{

    /**
     * Text constructor.
     *
     * @param object $agk
     */
    public function __construct(object $agk)
    {
        parent::__construct($agk);

        $this->objectId = $this->agk->CreateText('');

    }

    /**
     * @var string String of a text object.
     */
    private string $text;

    /**
     * @var float Set the alpha component of the text color. The value should be in the range 0-255.
     */
    private float $colorAlpha = 255.0;
    /**
     * @var int Angle of rotation. Rotation angle(from 0 to 360).
     */
    private int $rotate = 0;

    /**
     * @var float - Text alignment. 0=left, 1=center, 2=right
     */
    private float $alignment;

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        switch ($property) {
            case 'text':
                $this->text = $this->agk->GetTextString($this->objectId);
                return $this->text;
                break;
            case 'size':
                return $this->agk->GetTextSize($this->objectId);
                break;
            case 'position':
                return [$this->agk->GetTextX($this->objectId), $this->agk->GetTextY($this->objectId)];
                break;
            case 'x':
                return $this->agk->GetTextX($this->objectId);
                break;
            case 'y':
                return $this->agk->GetTextY($this->objectId);
                break;
            case 'colorAlpha':
                $this->colorAlpha = $this->agk->GetTextColorAlpha($this->objectId);
                return $this->colorAlpha;
                break;
            case 'colorBlue':
                return $this->agk->GetTextColorBlue($this->objectId);
                break;
            case 'colorGreen':
                return $this->agk->GetTextColorGreen($this->objectId);
                break;
            case 'colorRed':
                return $this->agk->GetTextColorRed($this->objectId);
                break;
            case 'rotate':
                return $this->agk->rotate;
                break;
            case 'alignment':
                $this->alignment = $this->agk->GetTextAlignment($this->objectId);
                return $this->alignment;
                break;

        }
    }

    /**
     * @param $property
     * @param $value
     */
    public function __set($property, $value)
    {
        switch ($property) {
            /**Обновляет строку текстового
             * объекта новый текст будет
             * отображаться при следующем
             * обновлении экрана.
             */
            case 'text':
                $this->text = $value;
                $this->agk->SetTextString($this->objectId, $value);
                break;
            case 'size':
                $this->agk->SetTextSize($this->objectId, $value);
                break;
            case 'position':
                $this->agk->SetTextPosition($this->objectId, $value[0], $value[1]);
                break;
            case 'x':
                $this->agk->SetTextX($this->objectId, $value);
                break;
            case 'y':
                $this->agk->SetTextY($this->objectId, $value);
                break;
            case 'colorAlpha':
                $this->colorAlpha = $value;
                $this->agk->SetTextColorAlpha($this->objectId, $this->colorAlpha);
                break;
            case 'colorBlue':
                $this->agk->SetTextColorBlue($this->objectId, $value);
                break;
            case 'colorGreen':
                $this->agk->SetTextColorGreen($this->objectId, $value);
                break;
            case 'colorRed':
                $this->agk->SetTextColorRed($this->objectId, $value);
                break;
            case 'rotate':
                $this->rotate = $value;
                $this->agk->SetTextAngle($this->objectId, $this->rotate);
                break;
            case 'alignment':
                $this->alignment = $value;
                $this->agk->SetTextAlignment($this->objectId, $this->alignment);
                break;
        }
    }

    /**
     *
     * @return void
     */
    public function free()
    {
        $this->agk->DeleteText($this->objectId);
    }

    /**
     * Проверить, уничтожен ли объект.
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->agk->GetTextExists($this->objectId) ? true : false;
    }


}