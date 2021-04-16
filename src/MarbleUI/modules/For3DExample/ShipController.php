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
        $ship->SetPosition([5, 0, 5]);
        $ship->SetImage( $this->ImageController->GetTextureByCode('StarSparrow_Black') );
        $ship->RotateY(180);

        $ship->SetTag('Main_Ship');
        //$ship->SetImage( $this->ImageController->GetTextureByCode('StarSparrow_Normal'), 2 );

        $this->Camera->SetPosition([0, 2, 7]);
        $this->Camera->SetRotation([0,180,0]);
        $this->Camera->SetFov(90);
        $this->Camera->FixToObject($ship->objectId);

    }

    public function Update()
    {
        $KB = $this->KB;
        $agk = $this->AppGameKit;
        $ship = $this->Core3D->GetObjectWidthTag('Main_Ship');

        if ($KB->KeyW())
            if($this->shipSpeed > -0.5)
                $this->shipSpeed -= 0.005;
            //$ship->MoveZ(-0.1);
        if ($KB->KeyS())
            if($this->shipSpeed < 0.5)
                $this->shipSpeed += 0.005;
            //$ship->MoveZ(0.1);
        if ($KB->KeyA())
            $ship->MoveX(0.1);
        if ($KB->KeyD())
            $ship->MoveX(-0.1);
        if ($KB->KeyQ())
            $ship->RotateZ(-0.5);
        if ($KB->KeyE())
            $ship->RotateZ(0.5);

        if($this->shipSpeed > 0.1 or $this->shipSpeed < -0.1) {
            $agk->Print("Ship speed: ". $this->shipSpeed);
            $ship->MoveZ($this->shipSpeed);
        }

        if($this->KB->ESC_Pressed() == 1) {
            if($this->useMouse){
                $this->useMouse = false;
                $agk->SetRawMouseVisible( 1 );
            }else{
                $this->useMouse = true;
                $agk->SetRawMouseVisible( 0 );
            }
        }

        if($this->useMouse) {
            $thisPointerX = $agk->GetPointerX();
            if ($this->main->deviceCenterX+5 > $thisPointerX) {
                $rot = ($this->main->deviceCenterX - $thisPointerX) / 30;
                $ship->RotateY(-$rot);
            } else if ($this->main->deviceCenterX-5 < $thisPointerX) {
                $rot = ($thisPointerX - $this->main->deviceCenterX) / 30;
                $ship->RotateY($rot);
            }

            $thisPointerY = $agk->GetPointerY();
            if ($this->main->deviceCenterY+5 > $thisPointerY) {
                $rot = ($this->main->deviceCenterY - $thisPointerY) / 30;
                $ship->RotateX($rot);
            } else if ($this->main->deviceCenterY-5 < $thisPointerY) {
                $rot = ($thisPointerY - $this->main->deviceCenterY) / 30;
                $ship->RotateX(-$rot);
            }

            $agk->SetRawMousePosition($this->main->deviceCenterX, $this->main->deviceCenterY);
            //$agk->SetCameraRotation(1, 0, $this->rotateY, 0);
        }
    }
}