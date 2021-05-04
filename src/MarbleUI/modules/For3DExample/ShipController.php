<?php


namespace MarbleUI\modules\For3DExample;


use fibonaccifox\AppGameKit;
use MarbleUI\modules\Core3D;
use MarbleUI\modules\Misc\Camera3D;
use MarbleUI\modules\Misc\ImagesController;
use MarbleUI\modules\Misc\KeyBoardController;

class ShipController
{
    private AppGameKit $AppGameKit;
    private Core3D $Core3D;
    private ImagesController $ImageController;
    private KeyBoardController $KB;
    private Camera3D $Camera;
    private $useMouse;
    private $main;

    private $shipSpeed;

    private $maxSpeed;

    private $pivot;

    private $engineParticles;

    private $ship;
    private $shipOldPos;

    private array $ui;

    private float $boostValue;
    private float $boostValueMax;
    private float $boostValueUse;
    private float $boostValueReload;
    private float $boostValueProcent;
    private bool $boostAllowUse;

    private int $shipEngineAudio;
    private int $shipAudio;

    private bool $backCam;

    public function __construct(AppGameKit $agk, Core3D $Core3D, ImagesController $ImageController, KeyBoardController $KeyBoardController, Camera3D $Camera, \index3D $mainClass)
    {
        $this->AppGameKit = $agk;
        $this->Core3D = $Core3D;
        $this->ImageController = $ImageController;
        $this->KB = $KeyBoardController;
        $this->Camera = $Camera;
        $this->useMouse = true;
        $this->main = $mainClass;
        $this->setup();
    }

    private function setup(){
        $this->boostValueMax = 5;
        $this->boostValueUse = 0.005;
        $this->boostValueReload = 0.001;
        $this->boostValue = 5;
        $this->boostValueProcent = 5 / $this->boostValueMax;
        $this->boostAllowUse = true;
        $this->backCam = false;

        $ship = $this->Core3D->LoadSimpleObject("objects/Ship1/StarSparrow01.obj");
        $ship->SetPosition([0, 0, 0]);
        $ship->SetImage($this->ImageController->GetTextureByCode('StarSparrow_Black'));
        $ship->RotateY(180);
        $this->ship = $ship;

        $pivot = $this->Core3D->CreateBox([0.1, 0.1, 0.1]);
        $pivot->SetPosition([1500, 75, 1500]);
        $this->pivot = $pivot;
        $ship->FixToObject($pivot);

        $ship->SetTag('Main_Ship');

        $this->Camera->SetPosition([0, 2, -10]);
        $this->Camera->SetRotation([0, 0, 0]);

        /*$this->Camera->SetPosition([0, 100, -10]);
        $this->Camera->SetRotation([90, 0, 0]);*/
        $this->Camera->SetFov(70);
        $this->Camera->FixToObject($pivot->objectId);
        $this->maxSpeed = 35;

        $this->engineParticles = $this->Core3D->CreateParticle([1500, 75, 1500]);
        $this->engineParticles->SetDirection(0, 0, 0, 0);
        $this->engineParticles->SetLife(2);
        $this->engineParticles->SetSize(0.2);
        $this->engineParticles->SetFrequency(60);
        $this->engineParticles->SetImage($this->ImageController->GetTextureByCode("engine_particle"));
        $this->engineParticles->SetColorInterpolation(1);
        $this->engineParticles->AddColorKeyFrame(0, 0, 0, 0, 200);
        $this->engineParticles->AddColorKeyFrame(0.1, 255, 255, 255, 75);
        $this->engineParticles->AddScaleKeyFrame(0, 1);
        $this->engineParticles->AddScaleKeyFrame(0.1, 15);
        $this->engineParticles->AddColorKeyFrame(2, 255, 255, 255, 1);
        $this->engineParticles->AddScaleKeyFrame(2, 35);
        $this->engineParticles->FixToObject($ship);

        $agk = $this->AppGameKit;

        //----------------------------------------------------------------
        $xUI = $this->main->width / 2 - 500;
        $yUI = $this->main->height / 2 + 300;

        $ui_1 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_1") );
        $ui_2 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_2") );

        $agk->SetSpritePosition($ui_1, 10 + $xUI, 10 + $yUI);
        $agk->SetSpritePosition($ui_2, 10 + $xUI, 10 + $yUI);

        $agk->SetSpriteTransparency($ui_1, 1);
        $agk->SetSpriteTransparency($ui_2, 1);

        $this->ui['ui_1'] = $ui_1;
        $this->ui['ui_2'] = $ui_2;

        $ui_3 = $agk->CreateText("Engine");
        $agk->SetTextX($ui_3, 10 +  $xUI);
        $agk->SetTextY($ui_3, -10 + $yUI);
        $agk->SetTextSize($ui_3, 17);

        $this->ui['ui_text'] = $ui_3;
        //----------------------------------------------------------------
        $xUI = $this->main->width / 2 - 500;
        $yUI = $this->main->height / 2 + 200;

        $ui_4 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_1") );
        $ui_5 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_4") );

        $agk->SetSpritePosition($ui_4, 10 + $xUI, 10 + $yUI);
        $agk->SetSpritePosition($ui_5, 10 + $xUI, 10 + $yUI);

        $agk->SetSpriteTransparency($ui_4, 1);
        $agk->SetSpriteTransparency($ui_5, 1);

        $ui_6 = $agk->CreateText("HP");
        $agk->SetTextX($ui_6, 10 +  $xUI);
        $agk->SetTextY($ui_6, -10 + $yUI);
        $agk->SetTextSize($ui_6, 17);
        //----------------------------------------------------------------
        $xUI = $this->main->width / 2 - 500;
        $yUI = $this->main->height / 2 + 250;

        $ui_7 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_1") );
        $ui_8 = $agk->CreateSprite( $this->ImageController->GetTextureByCode("progress_5") );

        $agk->SetSpritePosition($ui_7, 10 + $xUI, 10 + $yUI);
        $agk->SetSpritePosition($ui_8, 10 + $xUI, 10 + $yUI);

        $agk->SetSpriteTransparency($ui_7, 1);
        $agk->SetSpriteTransparency($ui_8, 1);

        $ui_9 = $agk->CreateText("Shield");
        $agk->SetTextX($ui_9, 10 +  $xUI);
        $agk->SetTextY($ui_9, -10 + $yUI);
        $agk->SetTextSize($ui_9, 17);
        //----------------------------------------------------------------

        $this->shipAudio = $agk->LoadMusicOGG($agk->getPath("audio/ship.ogg"));
        $agk->PlayMusicOGG($this->shipAudio, 1);
        $agk->SetMusicVolumeOGG($this->shipAudio, 25);

        $this->shipEngineAudio = $agk->LoadMusicOGG($agk->getPath("audio/engine.ogg"));
        $agk->PlayMusicOGG($this->shipEngineAudio, 1);
        $agk->SetMusicVolumeOGG($this->shipEngineAudio, 0);
    }

    public function GetID(){
        return $this->ship->objectId;
    }

    public function Update()
    {
        $KB = $this->KB;
        $agk = $this->AppGameKit;
        $ship = $this->ship;
        $ms = $this->maxSpeed;

        //UPDATE UI
        $ui_2Scale = ($this->boostValue / $this->boostValueMax * 125) * $this->boostValueProcent;
        $agk->SetSpriteSize($this->ui['ui_2'], $ui_2Scale, 15);

        if ($KB->SHIFT() and $this->boostValue > 0 and $this->boostAllowUse) {
            $ms = $this->maxSpeed * 1.75;
            $this->boostValue -= $this->boostValueUse;
            if($this->boostValue <= 0){
                $this->boostAllowUse = false;
                $agk->SetSpriteImage($this->ui['ui_2'], $this->ImageController->GetTextureByCode('progress_3'));
            }
        }else{
            if($this->boostValue < $this->boostValueMax)
                $this->boostValue += $this->boostValueReload;
        }
        if(!$this->boostAllowUse and $this->boostValue > 2) {
            $this->boostAllowUse = true;
            $agk->SetSpriteImage($this->ui['ui_2'], $this->ImageController->GetTextureByCode('progress_2'));
        }

        $agk->SetTextString($this->ui['ui_text'], "Boost: " . floor($this->boostValue / $this->boostValueMax * 100) . "%");

        if ($KB->KeyW())
            if ($this->shipSpeed < $ms)
                $this->shipSpeed += 0.1;
        //$ship->MoveZ(-0.1);
        if ($KB->KeyS())
            if ($this->shipSpeed > -$ms/3)
                $this->shipSpeed -= 0.1;

        if ($this->shipSpeed > $ms) {
            $this->shipSpeed -= 0.5;
        } elseif ($this->shipSpeed < -$ms) {
            $this->shipSpeed += 0.5;
        }

        $agk->SetMusicVolumeOGG($this->shipEngineAudio, floor(abs($this->shipSpeed/2)));
        $aZ = $ship->GetAngleZ();

        if ($KB->KeyA()) {
            $this->pivot->MoveX(-abs(0.1 + abs($this->shipSpeed/3)) * $this->main->deltaTime );
            if ($aZ > -50)
                $ship->RotateZ(-1 + abs(0.1 * $this->shipSpeed * $this->main->deltaTime));
        }
        if ($KB->KeyD()) {
            $this->pivot->MoveX(abs(0.1 + abs($this->shipSpeed/3)) * $this->main->deltaTime);
            if ($aZ < 50)
                $ship->RotateZ(1 - abs(0.1 * $this->shipSpeed * $this->main->deltaTime));
        }

        if ($KB->KeyQ()) {
            $this->pivot->RotateZ(0.5);
        }
        if ($KB->KeyE()) {
            $this->pivot->RotateZ(-0.5);
        }

        if ($this->shipSpeed > 0.1 or $this->shipSpeed < -0.1) {
            //$agk->Print("Ship speed: " . $this->shipSpeed);
            $speedAmount = $this->shipSpeed * $this->main->deltaTime;

            $this->shipOldPos = $this->ship->GetWorldPosition();
            $this->pivot->MoveZ($speedAmount);
            $shipThisPos = $this->ship->GetWorldPosition();
            $this->engineParticles->SetDirection( ($this->shipOldPos[0] - $shipThisPos[0]) * 5, ($this->shipOldPos[1] - $shipThisPos[1]) * 5, ($this->shipOldPos[2] - $shipThisPos[2]) * 5, 0);
            //$agk->Print("DeltaTime: " . $this->main->deltaTime);
            $this->Camera->SetFov(60 + abs($this->shipSpeed/2));
        }

        if(abs($this->shipSpeed) < 4){
            $this->engineParticles->SetVisible(0);
        }else{
            $this->engineParticles->SetVisible(1);
        }

        if ($this->KB->ESC_Pressed() == 1) {
            if ($this->useMouse) {
                $this->useMouse = false;
                $agk->SetRawMouseVisible(1);
            } else {
                $this->useMouse = true;
                $agk->SetRawMouseVisible(0);
            }
        }

        $xRotate = false;
        if ($this->useMouse) {
            $thisPointerX = $agk->GetPointerX();
            $aZ = $ship->GetAngleZ();
            if ($this->main->deviceCenterX - 5 > $thisPointerX) {
                $rot = ($this->main->deviceCenterX - $thisPointerX) / 30;
                $this->pivot->RotateY(-$rot);
                //$ship->SetRotationY(-($rot*2) - 180);
                $xRotate = true;
                if ($aZ > -50)
                    $ship->RotateZ(-0.8 + abs(0.1 * $this->shipSpeed * $this->main->deltaTime));
            } else if ($this->main->deviceCenterX + 5 < $thisPointerX) {
                $rot = ($thisPointerX - $this->main->deviceCenterX) / 30;
                $this->pivot->RotateY($rot);
                //$ship->SetRotationY(($rot*2) - 180);
                $xRotate = true;
                if ($aZ < 50)
                    $ship->RotateZ(0.8 - abs(0.1 * $this->shipSpeed * $this->main->deltaTime));
            }

            $thisPointerY = $agk->GetPointerY();
            if ($this->main->deviceCenterY + 5 > $thisPointerY) {
                $rot = ($this->main->deviceCenterY - $thisPointerY) / 30;
                $this->pivot->RotateX(-$rot);
                $ship->SetRotationX(-($rot*2));
            } else if ($this->main->deviceCenterY - 5 < $thisPointerY) {
                $rot = ($thisPointerY - $this->main->deviceCenterY) / 30;
                $this->pivot->RotateX($rot);
                $ship->SetRotationX(($rot*2));
            }

            $agk->SetRawMousePosition($this->main->deviceCenterX, $this->main->deviceCenterY);
            //$agk->SetCameraRotation(1, 0, $this->rotateY, 0);
        }

        if (!$KB->KeyA() and !$KB->KeyD() and !$xRotate) {
            if ($aZ > 1)
                $ship->RotateZ(-1);
            if ($aZ < -1)
                $ship->RotateZ(1);
        }

        if( $KB->CTRL_Pressed() ){
            $this->backCam = true;
            $this->Camera->SetPosition([0, 1, 3]);
            $this->Camera->SetRotation([0, 180, 0]);

        }elseif ($KB->CTRL_Released()){
            $this->backCam = false;

            $this->Camera->SetPosition([0, 2, -10]);
            $this->Camera->SetRotation([0, 0, 0]);
        }
    }
}