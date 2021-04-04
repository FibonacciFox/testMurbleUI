<?php


namespace MarbleUI\modules;

use fibonaccifox\AppGameKit;

/** Complete:
 * --Creation--
 * CreateText !
 * DeleteAllText
 * DeleteText !
 * --Properties--
 * DrawText !
 * FixTextToScreen !
 * GetTextAlignment !
 * GetTextCharAngle
 * GetTextCharAngleRad
 * GetTextCharColorAlpha
 * GetTextCharColorBlue
 * GetTextCharColorGreen
 * GetTextCharColorRed
 * GetTextCharX
 * GetTextCharY
 * GetTextColorAlpha !
 * GetTextColorBlue !
 * GetTextColorGreen !
 * GetTextColorRed !
 * GetTextDepth !
 * GetTextExists !
 * GetTextHitTest
 * GetTextLength
 * GetTextLineSpacing
 * GetTextSize !
 * GetTextSpacing
 * GetTextString !
 * GetTextTotalHeight
 * GetTextTotalWidth
 * GetTextVisible !
 * GetTextX !
 * GetTextY !
 *
 * SetTextAlignment !
 * SetTextAngle !
 * SetTextAngleRad !
 * SetTextBold
 * SetTextCharAngle
 * SetTextCharAngleRad
 * SetTextCharBold
 * SetTextCharColor
 * SetTextCharColorAlpha
 * SetTextCharColorBlue
 * SetTextCharColorGreen
 * SetTextCharColorRed
 * SetTextCharPosition
 * SetTextCharX
 * SetTextCharY
 * SetTextColor !
 * SetTextColorAlpha !
 * SetTextColorBlue !
 * SetTextColorGreen !
 * SetTextColorRed !
 * SetTextDefaultExtendedFontImage
 * SetTextDefaultFontImage
 * SetTextDefaultMagFilter
 * SetTextDefaultMinFilter
 * SetTextDepth !
 * SetTextExtendedFontImage
 * SetTextFont
 * SetTextFontImage
 * SetTextLineSpacing
 * SetTextMaxWidth
 * SetTextPosition !
 * SetTextScissor
 * SetTextSize !
 * SetTextSpacing
 * SetTextString !
 * SetTextTransparency !
 * SetTextVisible !
 * SetTextX !
 * SetTextY !
 * UseNewDefaultFonts
 */


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
 * @property int $angleRad  -  The new angle in radians.
 * @property int $alignment - Text alignment. 0=left, 1=center, 2=right
 * @property int $transparency -  The transparency mode for this text, 0=off, 1=alpha transparency, 2=additive
 *     blending.
 * @property int $depth - The current depth of the text object, where 0 is the front of the screen and 10000 is the
 *     back.
 * @property bool $visible -
 * @property bool $fixToScreen - By default text objects are created in world coordinates and SetViewOffset can be used
 *     to move around the world. Use this command to instead fix the text to the screen so it will move with the
 *     viewport when the viewport is moved around. You can still reposition a text that is fixed to the screen, it only
 *     affects what happens when the viewport is moved. MODE: (true = screen text, false = world text);
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
     * @var float|int - Size of the text object.
     */
    private float $size = 4;


    /**
     * @var array - Position of a text object in world coordinates.
     */
    private array $position;

    /**
     * @var float Set the alpha component of the text color. The value should be in the range 0-255.
     */
    private float $colorAlpha;
    /**
     * @var int Angle of rotation. Rotation angle(from 0 to 360).
     */
    private int $angle = 0;

    /**
     * @var int -  The new angle in radians.
     */
    private int $angleRad = 0;

    /**
     * @var float - Text alignment. 0=left, 1=center, 2=right
     */
    private float $alignment;

    /**
     * @var int -  The transparency mode for this text, 0=off, 1=alpha transparency, 2=additive blending.
     */
    private int $transparency = 1;


    /**
     * @var float  - X position of a text object in world coordinates.
     */
    private float $x;


    /**
     * @var float  - Y position of a text object in world coordinates.
     */
    private float $y;

    /**
     * @var int $colorBlue -  Blue component of the text color. The value should be in the range 0-255.
     */
    private int $colorBlue;

    /**
     * @var int $colorGreen -  Green component of the text color. The value should be in the range 0-255.
     */
    private int $colorGreen;

    /**
     * @var int $colorRed -  Red component of the text color. The value should be in the range 0-255.
     */
    private int $colorRed;

    /**
     * @var int - The current depth of the text object, where 0 is the front of the screen and 10000 is the back.
     */
    private int $depth;

    /**
     * @var bool
     */
    private bool $visible = true;


    /**
     * @var bool By default text objects are created in world coordinates and SetViewOffset can be used to move around
     *     the world. Use this command to instead fix the text to the screen so it will move with the viewport when the
     *     viewport is moved around. You can still reposition a text that is fixed to the screen, it only affects what
     *     happens when the viewport is moved. MODE: (true = screen text, false = world text)
     */
    private bool $fixToScreen = false;

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
            case 'fixToScreen':
                return $this->fixToScreen;
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
                return $this->colorGreen;
                break;
            case 'colorRed':
                $this->colorRed = $this->agk->GetTextcolorRed($this->objectId);
                return $this->colorRed;
                break;
            case 'angle':
                //Есть только сеттер
                return $this->angle;
                break;
            case 'angleRad':
                //Есть только сеттер
                return $this->angleRad;
                break;
            case 'alignment':
                $this->alignment = $this->agk->GetTextAlignment($this->objectId);
                return $this->alignment;
                break;
            case 'transparency':
                //Есть только сеттер
                return $this->transparency;
                break;
            case 'depth':
                $this->depth = $this->agk->GetTextDepth($this->objectId);
                return $this->depth;
                break;
            case 'visible':
                $this->visible = $this->agk->GetTextVisible($this->objectId);
                return $this->visible;
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
            case 'fixToScreen':
                $this->fixToScreen = $value;
                $this->agk->FixTextToScreen($this->objectId, $this->fixToScreen);
                break;
            case 'size':
                $this->agk->SetTextSize($this->objectId, $value);
                break;
            case 'position':
                $this->agk->SetTextPosition($this->objectId, $value[0], $value[1]);
                break;
            case 'x':
                $this->text = $value;
                $this->agk->SetTextX($this->objectId, $this->text);
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
            case 'angleRad':
                $this->angleRad = $value;
                $this->agk->SetTextAngleRad($this->objectId, $this->angle);
                break;
            case 'alignment':
                $this->alignment = $value;
                $this->agk->SetTextAlignment($this->objectId, $this->alignment);
                break;
            case 'transparency':
                $this->transparency = $value;
                $this->agk->SetTextTransparency($this->objectId, $this->transparency);
                break;
            case 'depth':
                $this->depth = $value;
                $this->agk->SetTextDepth($this->objectId, $this->depth);
                break;
            case 'visible':
                $this->visible = $value;
                $this->agk->SetTextVisible($this->objectId, $this->visible);
                break;
        }
        parent::__set($property, $value);
    }

    /**
     * Destroy the object.
     *
     * Уничтожить объект
     *
     * @return void
     */
    public function free()
    {
        $this->agk->DeleteText($this->objectId);
    }

    /**
     * Check whether the object is destroyed.
     *
     * Проверить, уничтожен ли объект.
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->agk->GetTextExists($this->objectId) ? true : false;
    }

    /**
     * Set the color of the text, the values should be in the range 0-255.
     * This will set all characters in the text to be this color.
     *
     * Установите цвет текста, значения должны быть в диапазоне 0-255.
     * Это установит этот цвет для всех символов в тексте.
     *
     * @param int $Red
     * @param int $Green
     * @param int $Blue
     * @param int|null $Alpha
     */
    public function SetColor(int $Red, int $Green, int $Blue, int $Alpha = null)
    {
        if ($Alpha == null) $this->agk->SetTextColor($this->objectId, $Red, $Green, $Blue, $this->colorAlpha);
        else  $this->agk->SetTextColor($this->objectId, $Red, $Green, $Blue, $Alpha);
    }

    /**
     * Get an array of text colors in RGBA format
     *
     * Получить массив цвета текста в формате RGBA.
     *
     * @return array
     */
    public function GetColor(): array
    {
        return [$this->colorRed, $this->colorGreen, $this->colorBlue, $this->colorAlpha];
    }


    /**
     * Immediately draws the text to the backbuffer at its current position, size, and rotation. This is useful if you
     * want to setup a scene for GetImage to capture. Remember to use ClearScreen to clear any of your own drawing
     * before calling Sync or Render for the actual frame otherwise your drawing may appear twice in the final render.
     *
     * Сразу же рисует текст в backbuffer в его текущем положении, размере и повороте. Это полезно, если вы хотите
     * настроить сцену или изображение для захвата. Не забудьте использовать Clear Screen для очистки любого вашего
     * собственного рисунка перед вызовом Sync или Render для фактического кадра, иначе ваш рисунок может появиться
     * дважды в окончательном рендеринге.
     */
    public function Draw()
    {
        $this->agk->DrawText($this->objectId);
    }


}