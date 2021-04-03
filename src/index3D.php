<?php

use fibonaccifox\AppGameKit;
use MarbleUI\modules\Text;
use \MarbleUI\modules\Core3D;

class index3D
{
    public AppGameKit $AppGameKit;
    private Core3D $Core3D;
    var $textures;

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
        $this->Core3D = new Core3D($agk);

        $dir_link = "media/textures/";
        $dir_data = scandir(realpath($dir_link));
        var_dump($dir_data);

        $id = 0;
        foreach ($dir_data as $file){
            if($file != "." and $file != ".." and $file != "player.png"){
                $path = $agk->getPath("textures/$file");
                var_dump($path);
                $id_l = $agk->LoadImage($path);
                var_dump($path);
                //var_dump($id_l);
                $this->textures[] = $id_l;
                $id++;
            }
        }
        //var_dump(1);
        //var_dump($this->textures);
        for ($i=-600; $i<=600; $i++) {
            $box = $this->Core3D->CreateBox();
            $box->SetPosition([$i*2, 0, 0]);
            $box->Tag = 'MyBox';
            $box->SetData('Strafe', false);

            $this->AppGameKit->SetObjectImage($box->objectId, $this->textures[rand(0, $id)], 0);
        }

        //$this->AppGameKit->SetScreen
        //var_dump($box->GetData('Strafe'));
    }

    public function Loop()
    {
        if(false == true) {
            $agk = $this->AppGameKit;

            $boxs = $this->Core3D->GetObjectsWidthTag('MyBox'); //Вернет первый объект с таким тегом
            //var_dump($boxs);
            /**
             * @var \MarbleUI\modules\Objects3D\Object3D $box
             */
            foreach ($boxs as $box) {

                if ($box->GetX() != 0) {
                    if ($box->GetData('Strafe')) {
                        $box->MoveX(0.25);
                    } else {
                        $box->MoveX(-0.25);
                    }
                }
                //var_dump($box->x);

                //if ($box->GetX() < -6) $box->SetData('Strafe', true);
                //if ($box->GetX() > 6) $box->SetData('Strafe', false);
            }
            //$b = $agk->MakeColor(0, 136, 255);
            //$agk->DrawBox(500, 50, 650, 150, $b, $b, $b, $b, 1);
            $agk->Print($agk->ScreenFPS());
            $agk->Sync();
        }
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new index3D();
