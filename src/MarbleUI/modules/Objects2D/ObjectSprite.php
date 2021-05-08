<?php


namespace MarbleUI\modules\Objects2D;

use fibonaccifox\AppGameKit;

class ObjectSprite extends Object2D
{
    public function __construct( AppGameKit $agk, int $imageID )
    {
        $objectID = $agk->CreateSprite($imageID);
        $this->objectId = $objectID;
        parent::__construct($agk);
    }

    public function SetX(float $x = 0){
        $this->agk->SetSpriteX($this->objectId, $x);
    }

    public function SetY(float $y = 0){
        $this->agk->SetSpriteY($this->objectId, $y);
    }

    public function SetPosition(array $position = [0,0]){
        $this->agk->SetSpritePosition($this->objectId, $position[0], $position[1]);
    }

    public function SetWidth(float $w){
        $this->agk->SetSpriteSize($this->objectId, $w, $this->agk->GetSpriteHeight($this->objectId));
    }

    public function SetHeight(float $h){
        $this->agk->SetSpriteSize($this->objectId, $this->agk->GetSpriteWidth($this->objectId), $h);
    }

    public function SetSize(array $size = [0, 0]){
        $this->agk->SetSpriteSize($this->objectId, $size[0], $size[1]);
    }

    public function SetTransparency(int $mode){
        $this->agk->SetSpriteTransparency($this->objectId, $mode);
    }
}