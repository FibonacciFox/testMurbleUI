<?php

use fibonaccifox\AppGameKit;
use MarbleUI\modules\Text;
use \MarbleUI\modules\Core3D;

class index3D
{
    public AppGameKit $AppGameKit;
    private Core3D $Core3D;
    var $textures;

    private $testID;

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

        $this->testID = 2;

        /*$agk->SetWindowAllowResize(0);
        $agk->SetSyncRate(60, 0);
        $agk->SetAntiAliasMode(1);
        $agk->SetOrientationAllowed(1, 1, 1, 1);
        $agk->SetScissor(0, 0, 0, 0);
        $agk->SetCameraRange(1, 0.01, 3000);
        $agk->SetSunActive(1);*/

        $this->Core3D = new Core3D($agk);

        //Загрузка текстур
        $dir_link = "media/textures/";
        $dir_data = scandir(realpath($dir_link));
        $id = 0;
        foreach ($dir_data as $file) {
            if ($file != "." and $file != ".." and $file != "player.png") {
                $path = $agk->getPath("textures/$file");
                $path = str_replace('\\', '/', $path);
                $agk->LoadImage($id, $path);
                $this->textures[] = $id;
                $id++;
            }
        }

        if($this->testID == 1) {
            //Создание объектов
            for ($i = -300; $i <= 300; $i++) {
                if ($i < 0) $y = 1;
                else $y = -1;

                $objectNumber = rand(0, 4);

                switch ($objectNumber) {
                    case 0:
                        $object = $this->Core3D->CreateBox();
                        break;
                    case 1:
                        $object = $this->Core3D->CreateSphere();
                        break;
                    case 2:
                        $object = $this->Core3D->CreateCapsule();
                        break;
                    case 3:
                        $object = $this->Core3D->CreateCone();
                        break;
                    case 4:
                        $object = $this->Core3D->CreateCylinder();
                        break;
                }

                $object->SetPosition([$i * 2, $y, 0]);
                $object->Tag = 'MyBox';
                $object->SetData('Strafe', false);
                $object->SetScale([rand(0.2, 5), rand(0.2, 5), rand(0.2, 5)]);
                $object->SetImage($this->textures[rand(1, $id)]);
            }
        }

        if($this->testID == 2) {
            $box_1 = $this->Core3D->CreateBox();
            $box_1->SetPosition([-5, 0, 0]);
            $box_1->SetImage(1);
            $box_1->Tag = 'Mother_box';

            $box_2 = $this->Core3D->CreateBox();
            $box_2->SetPosition([10, 0, 0]);
            $box_2->SetImage(2);
            $box_2->FixToObject($box_1->objectId);

            $box_1->SetData('Strafe', false);
        }
    }

    public function Loop()
    {
        $agk = $this->AppGameKit;

        if($this->testID == 1) {
            $boxs = $this->Core3D->GetObjectsWidthTag('MyBox');
            /**
             * @var \MarbleUI\modules\Objects3D\Object3D $box
             */
            foreach ($boxs as $box) {

                if ($box->GetX() != 0) {
                    if ($box->GetData('Strafe')) {
                        $box->MoveX(0.1);
                    } else {
                        $box->MoveX(-0.1);
                    }
                }

                if ($box->GetX() < 0) $box->SetData('Strafe', true);
                if ($box->GetX() > 0) $box->SetData('Strafe', false);
            }
            $agk->MoveCameraLocalZ(1, -0.025);
        }

        if($this->testID == 2) {
            $box = $this->Core3D->GetObjectWidthTag('Mother_box');
            if( $box->GetY() > 2 ) $box->SetData('Strafe', false);
            elseif ( $box->GetY() < -2 ) $box->SetData('Strafe', true);

            $strafe = $box->GetData('Strafe');
            if($strafe)
                $box->MoveY(0.025);
            else
                $box->MoveY(-0.025);
        }

        $agk->Print($agk->ScreenFPS());
        $agk->Sync();
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new index3D();
