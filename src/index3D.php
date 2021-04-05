<?php

use fibonaccifox\AppGameKit;
use \MarbleUI\modules\Core3D;
use \MarbleUI\modules\Misc\ImagesController;

class index3D
{
    public AppGameKit $AppGameKit;
    private Core3D $Core3D;
    private ImagesController $ImageController;

    //var $textures;


    public function __construct()
    {
        $this->AppGameKit = new AppGameKit($this);
        $agk = $this->AppGameKit;
        $agk->Init(1920, 1080, false);
    }

    public function Begin()
    {
        var_dump("Begin!");
        $agk = $this->AppGameKit;
        $agk->SetWindowTitle('Hello World');
        $agk->SetVirtualResolution(1920, 1080);
        $agk->SetVSync(1);


        $agk->SetWindowAllowResize(0);
        //$agk->SetSyncRate(60, 0);
        $agk->SetAntiAliasMode(1);
        $agk->SetOrientationAllowed(1, 1, 1, 1);
        $agk->SetScissor(0, 0, 0, 0);
        $agk->SetCameraRange(1, 0.01, 3000);
        $agk->SetSunActive(1);
        //var_dump($agk);
        $this->Core3D = new Core3D($agk);

        //Загрузка текстур
        $this->ImageController = new ImagesController($agk);
        $this->ImageController->LoadTexturesDirectory('textures');

        $box_1 = $this->Core3D->CreateBox();
        $box_1->SetPosition([0, 0, 0]);
        $box_1->SetImage($this->ImageController->GetTextureByCode('brks_1'));
        $box_1->SetTag('Mother_box');

        $box_2 = $this->Core3D->CreateBox();
        $box_2->SetPosition([-5, 0, 0]);
        $box_2->SetImage($this->ImageController->GetTextureByCode('brks_2'));
        $box_2->FixToObject($box_1);

        $box_3 = $this->Core3D->CreateBox();
        $box_3->SetPosition([5, 0, 0]);
        $box_3->SetImage($this->ImageController->GetTextureByCode('brks_2'));
        $box_3->FixToObject($box_1);

        $cylinder_1 = $this->Core3D->CreateCylinder(5, 0.5, 20);
        $cylinder_1->SetImage($this->ImageController->GetTextureByCode('brks_1'));
        $cylinder_1->FixToObject($box_1);

        $cylinder_2 = $this->Core3D->CreateCylinder(5, 0.5, 20);
        $cylinder_2->SetRotationZ(90);
        $cylinder_2->SetPosition([2.5, 0, 0]);
        $cylinder_2->SetImage($this->ImageController->GetTextureByCode('brks_2'));
        $cylinder_2->FixToObject($box_1);

        $cylinder_3 = $this->Core3D->CreateCylinder(5, 0.5, 20);
        $cylinder_3->SetRotationZ(90);
        $cylinder_3->SetPosition([-2.5, 0, 0]);
        $cylinder_3->SetImage($this->ImageController->GetTextureByCode('brks_2'));
        $cylinder_3->FixToObject($box_1);

        $box_1->SetData('Strafe', false);

        $plane = $this->Core3D->CreatePlane(10, 10);
        $plane->SetImage($this->ImageController->GetTextureByCode('brks_1'));
        //$plane->RotateX(90);
        $plane->SetRotationX(90);
        $plane->SetTag("Plane");
        $plane->SetY(-2.5);
        $plane->SetScale([3, 3, 1]);
    }

    public function Loop()
    {
        $agk = $this->AppGameKit;

        $box = $this->Core3D->GetObjectWidthTag('Mother_box');
        if ($box->GetY() > 2) $box->SetData('Strafe', false);
        elseif ($box->GetY() < -2) $box->SetData('Strafe', true);

        $strafe = $box->GetData('Strafe');
        if ($strafe)
            $box->MoveY(0.025);
        else
            $box->MoveY(-0.025);

        $box->RotateY(1);

        $agk->Print(floor($agk->ScreenFPS()));
        $agk->Sync();
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new index3D();
