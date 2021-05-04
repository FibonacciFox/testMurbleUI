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

    public function __construct(AppGameKit $agk, Core3D $Core3D, ImagesController $ImageController, KeyBoardController $KeyBoardController, Camera3D $Camera, \index3D $mainClass)
    {
        $this->AppGameKit = $agk;
        $this->Core3D = $Core3D;
        $this->ImageController = $ImageController;
        $this->KB = $KeyBoardController;
        $this->Camera = $Camera;
        $this->useMouse = true;
        $this->main = $mainClass;

        $ship = $this->Core3D->LoadSimpleObject("objects/Ship1/StarSparrow01.obj");
        $ship->SetPosition([0, 0, 0]);
        $ship->SetImage($this->ImageController->GetTextureByCode('StarSparrow_Black'));
        $ship->RotateY(180);
        $this->ship = $ship;

        $pivot = $this->Core3D->CreateBox([0.1, 0.1, 0.1]);
        $pivot->SetPosition([1500, 40, 1500]);
        //$pivot->SetPosition([0, 0, 0]);
        $this->pivot = $pivot;
        $ship->FixToObject($pivot);

        $ship->SetTag('Main_Ship');
        //$ship->SetImage( $this->ImageController->GetTextureByCode('StarSparrow_Normal'), 2 );

        $this->Camera->SetPosition([0, 2, -10]);
        $this->Camera->SetRotation([0, 0, 0]);

        /*$this->Camera->SetPosition([0, 100, -10]);
        $this->Camera->SetRotation([90, 0, 0]);*/
        $this->Camera->SetFov(70);
        $this->Camera->FixToObject($pivot->objectId);
        $this->maxSpeed = 35;

        $this->engineParticles = $this->Core3D->CreateParticle([1500, 40, 1500]);
        $this->engineParticles->SetDirection(0, 0, 0, 0);
        $this->engineParticles->SetLife(0.1);
        $this->engineParticles->SetSize(0.2);
        $this->engineParticles->SetFrequency(60);
        //$this->engineParticles->
        //$this->engineParticles->SetParticlesMax(30);
        $this->engineParticles->SetImage($this->ImageController->GetTextureByCode("engine_particle"));
        $this->engineParticles->SetColorInterpolation(1);
        $this->engineParticles->AddColorKeyFrame(0, 0, 175, 255, 190);
        $this->engineParticles->AddColorKeyFrame(0.1, 255, 255, 255, 75);
        $this->engineParticles->AddScaleKeyFrame(0, 1);
        $this->engineParticles->AddScaleKeyFrame(0.1, 15);
        $this->engineParticles->FixToObject($ship);

        //var_dump($this->Core3D);
        /*$this->engineParticles = *//*$this->Core3D->CreateParticle([0.0,0.0,0.0]);*/
        /*var_dump( $this->engineParticles);
        $this->engineParticles->SetDirection(-2, 0, 0, 0);
        $this->engineParticles->SetLife(1);
        $this->engineParticles->SetSize(0.1);
        $this->engineParticles->SetParticlesMax(30);
        $this->engineParticles->SetImage($this->ImageController->GetTextureByCode("engine_particle"));
        $this->engineParticles->SetColorInterpolation(1);
        $this->engineParticles->AddColorKeyFrame(0, 255, 0, 0);
        $this->engineParticles->AddColorKeyFrame(1, 255, 255, 255, 0);
        $this->engineParticles->AddScaleKeyFrame(0, 1);
        $this->engineParticles->AddScaleKeyFrame(1, 0.1);*/

        //$this->engineParticles->VelocityRange()
    }

    public function Update()
    {
        $KB = $this->KB;
        $agk = $this->AppGameKit;

        $ship = $this->Core3D->GetObjectWidthTag('Main_Ship');

        $ms = $this->maxSpeed;
        if ($KB->SHIFT())
            $ms = $this->maxSpeed * 1.75;

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
        //$this->engineParticles->SetLife(abs($this->shipSpeed) + 0.5);
        //$this->engineParticles->SetFrequency(floor(abs($this->shipSpeed*240) + 0.1));
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
            $agk->Print("Ship speed: " . $this->shipSpeed);
            $speedAmount = $this->shipSpeed * $this->main->deltaTime;

            $this->shipOldPos = $this->ship->GetWorldPosition();
            $this->pivot->MoveZ($speedAmount);
            $shipThisPos = $this->ship->GetWorldPosition();
            $this->engineParticles->SetDirection( ($this->shipOldPos[0] - $shipThisPos[0]) * 5, ($this->shipOldPos[1] - $shipThisPos[1]) * 5, ($this->shipOldPos[2] - $shipThisPos[2]) * 5, 0);
            //
            $agk->Print("DeltaTime: " . $this->main->deltaTime);
            /*if( abs($this->shipSpeed) > 10 ){
                $posFragment = [ ($shipThisPos[0]-$this->shipOldPos[0])/30, ($shipThisPos[1]-$this->shipOldPos[1])/30, ($shipThisPos[2]-$this->shipOldPos[2])/30 ];
                var_dump($posFragment);
                //$speedFragment = $speedAmount / 30;
                for($i=1; $i<30; $i++){
                    $this->engineParticles->SetPosition( [ $shipThisPos[0] + $posFragment[0] * $i, $shipThisPos[1] + $posFragment[1] * $i, $shipThisPos[2] + $posFragment[2] * $i] );
                    $idP = $this->engineParticles->objectId;
                    $agk->Draw3DParticles($idP);
                }
            }*/
            //$idP = $this->engineParticles->objectId;
            //$agk->Update3DParticles($idP, 0.5);
            $this->Camera->SetFov(60 + abs($this->shipSpeed/2));
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
    }
}