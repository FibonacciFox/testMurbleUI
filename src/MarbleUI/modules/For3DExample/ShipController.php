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


    public function __construct(AppGameKit $agk, Core3D $Core3D, ImagesController $ImageController, KeyBoardController $KeyBoardController, Camera3D $Camera, $mainClass)
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

        $pivot = $this->Core3D->CreateBox([0.1, 0.1, 0.1]);
        $pivot->SetPosition([1500, 40, 1500]);
        $this->pivot = $pivot;
        $ship->FixToObject($pivot);

        $ship->SetTag('Main_Ship');
        //$ship->SetImage( $this->ImageController->GetTextureByCode('StarSparrow_Normal'), 2 );

        $this->Camera->SetPosition([0, 2, -7]);
        $this->Camera->SetRotation([0, 0, 0]);
        $this->Camera->SetFov(70);
        $this->Camera->FixToObject($pivot->objectId);
        $this->maxSpeed = 1;
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
                $this->shipSpeed += 0.005;
        //$ship->MoveZ(-0.1);
        if ($KB->KeyS())
            if ($this->shipSpeed > -$ms/3)
                $this->shipSpeed -= 0.005;

        if ($this->shipSpeed > $ms) {
            $this->shipSpeed -= 0.01;
        } elseif ($this->shipSpeed < -$ms) {
            $this->shipSpeed += 0.01;
        }

        //$ship->MoveZ(0.1);
//        if ($KB->KeyA())
//            $ship->MoveX(0.1);
//        if ($KB->KeyD())
//            $ship->MoveX(-0.1);
//        if ($KB->KeyQ())
//            $ship->RotateZ(-0.5);
//        if ($KB->KeyE())
//            $ship->RotateZ(0.5);

        $aZ = $ship->GetAngleZ();

        if ($KB->KeyA()) {
            $this->pivot->MoveX(-abs(0.1 + abs($this->shipSpeed/3)) );
            if ($aZ > -50)
                $ship->RotateZ(-1 + abs(0.1 * $this->shipSpeed));
        }
        if ($KB->KeyD()) {
            $this->pivot->MoveX(abs(0.1 + abs($this->shipSpeed/3)));
            if ($aZ < 50)
                $ship->RotateZ(1 - abs(0.1 * $this->shipSpeed));
        }

        if (!$KB->KeyA() and !$KB->KeyD()) {
            if ($aZ > 1)
                $ship->RotateZ(-1);
            if ($aZ < -1)
                $ship->RotateZ(1);
        }

        if ($KB->KeyQ()) {
            $this->pivot->RotateZ(0.5);
        }
        if ($KB->KeyE()) {
            $this->pivot->RotateZ(-0.5);
        }

        if ($this->shipSpeed > 0.1 or $this->shipSpeed < -0.1) {
            $agk->Print("Ship speed: " . $this->shipSpeed);
            $this->pivot->MoveZ($this->shipSpeed);

            $this->Camera->SetFov(70 + abs($this->shipSpeed) * 20);
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

        if ($this->useMouse) {
            $thisPointerX = $agk->GetPointerX();
            if ($this->main->deviceCenterX + 5 > $thisPointerX) {
                $rot = ($this->main->deviceCenterX - $thisPointerX) / 30;
                $this->pivot->RotateY(-$rot);
                $ship->SetRotationY(-($rot*2) - 180);
            } else if ($this->main->deviceCenterX - 5 < $thisPointerX) {
                $rot = ($thisPointerX - $this->main->deviceCenterX) / 30;
                $this->pivot->RotateY($rot);
                $ship->SetRotationY(($rot*2) - 180);
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
    }
}