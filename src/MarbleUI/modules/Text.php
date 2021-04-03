<?php


namespace MarbleUI\modules;

use fibonaccifox\AppGameKit;

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
 * @property int $angle  -  Angle of rotation. Rotation angle(from 0 to 360).
 * @property int $alignment - Text alignment. 0=left, 1=center, 2=right
 * @property int $transparency -  The transparency mode for this text, 0=off, 1=alpha transparency, 2=additive blending.
 * @property int $depth - The current depth of the text object, where 0 is the front of the screen and 10000 is the back.
 * @package MarbleUI\modules
 */
class Text extends BaseObject
{

    /**
     * Text constructor.
     *
     * @param AppGameKit $agk
     */
    public function __construct(AppGameKit $agk)
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
    private float $colorAlpha;
    /**
     * @var int Angle of rotation. Rotation angle(from 0 to 360).
     */
    private int $angle = 0;

    /**
     * @var float - Text alignment. 0=left, 1=center, 2=right
     */
    private float $alignment;

    /**
     * @var int The transparency mode for this text, 0=off, 1=alpha transparency, 2=additive blending.
     */
    private int $transparency = 1;



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
                $this->size = $this->agk->GetTextSize($this->objectId);
                return $this->size;
                break;
            case 'position':
                $this->x = $this->agk->GetTextX($this->objectId);
                $this->y = $this->agk->GetTextY($this->objectId);
                return [$this->x, $this->y];
                break;
            case 'x':
                $this->x = $this->agk->GetTextX($this->objectId);
                return $this->x;
                break;
            case 'y':
                $this->y = $this->agk->GetTextY($this->objectId);
                return $this->y;
                break;
            case 'colorAlpha':
                $this->colorAlpha = $this->agk->GetTextColorAlpha($this->objectId);
                return $this->colorAlpha;
                break;
            case 'colorBlue':
                $this->colorBlue = $this->agk->GetTextColorBlue($this->objectId);
                return  $this->colorBlue;
                break;
            case 'colorGreen':
                $this->colorGreen = $this->agk->GetTextcolorGreen($this->objectId);
                return  $this->colorGreen;
                break;
            case 'colorRed':
                $this->colorRed = $this->agk->GetTextcolorRed($this->objectId);
                return  $this->colorRed;
                break;
            case 'angle':
                return $this->angle;
                break;
            case 'alignment':
                $this->alignment = $this->agk->GetTextAlignment($this->objectId);
                return $this->alignment;
                break;
            case 'transparency':
                //Есть только метод на установку альфа канала
                return $this->transparency;
                break;

        }
        return parent::__get($property);
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
            case 'angle':
                $this->angle = $value;
                $this->agk->SetTextAngle($this->objectId, $this->angle);
                break;
            case 'alignment':
                $this->alignment = $value;
                $this->agk->SetTextAlignment($this->objectId, $this->alignment);
                break;
            case 'transparency':
                $this->transparency = $value;
                $this->agk->SetTextTransparency($this->objectId, $this->transparency);
                break;
        }
        parent::__set($property, $value);
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