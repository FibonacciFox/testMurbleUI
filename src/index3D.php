<?php

use fibonaccifox\AppGameKit;
use \MarbleUI\modules\Core3D;
use \MarbleUI\modules\Misc\ImagesController;
use \MarbleUI\modules\Misc\KeyBoardController;
use \MarbleUI\modules\Misc\Camera3D;

//Классы для примера!!

use MarbleUI\modules\For3DExample\LevelController;
use MarbleUI\modules\For3DExample\ShipController;

//use php\gui\UXForm;
//use php\gui\UXApplication;
//use php\gui\UXLabel;
use php\lang\Thread;
//use php\framework;
//use php\gui;
//use php\gui\UXButton;

class index3D
{
    public AppGameKit $AppGameKit;
    public Core3D $Core3D;
    public ImagesController $ImageController;
    public KeyBoardController $KB;
    public Camera3D $Camera;

    var int $width;
    var int $height;

    var int $deviceCenterX;
    var int $deviceCenterY;

    public LevelController $LC;
    public ShipController $SC;

    private array $gui;

    public bool $Prepare;

    var $deltaTime = 1;

    public function __construct($deviceWidth, $deviceHeight)
    {
        global $App;
        $App = $this;
        $this->Prepare = false;

        $this->width = $deviceWidth;
        $this->height = $deviceHeight;

        $this->deviceCenterX = floor($deviceWidth / 2);
        $this->deviceCenterY = floor($deviceHeight / 2);

        $this->AppGameKit = new AppGameKit($this);
        $agk = $this->AppGameKit;
        $agk->Init($this->width, $this->height, false);

        $this->deltaTime = time();
    }

    public function Begin()
    {
        var_dump("Begin!");
        $agk = $this->AppGameKit;
        $agk->SetWindowTitle('Hello World');
        $agk->SetVirtualResolution($this->width, $this->height);
        $agk->SetVSync(1);

        $agk->SetWindowAllowResize(0);
        $agk->SetAntiAliasMode(1);
        $agk->SetOrientationAllowed(1, 1, 1, 1);
        $agk->SetScissor(0, 0, 0, 0);
        $agk->SetCameraRange(1, 0.1, 4000);
        $agk->SetSunActive(1);
        $agk->SetSkyBoxVisible(true);
        $agk->SetSkyBoxSunVisible(true);
        $agk->SetRawMouseVisible(0);

        $this->Core3D = new Core3D($agk);
        $this->KB = new KeyBoardController($agk);
        $this->Camera = new Camera3D($agk);
        $this->ImageController = new ImagesController($agk);
        $this->Camera->SetFov(60);

        //Грузим UI
        $this->ImageController->LoadTexturesDirectory('ui');

        $fon = $this->AppGameKit->CreateSprite($this->ImageController->GetTextureByCode("fon_0001"));
        $this->AppGameKit->SetSpriteSize($fon, $this->width, $this->height);
        $this->AppGameKit->SetSpritePosition($fon, 0, 0);
        $this->AppGameKit->Sync();

        //Грузим другие текстуры
        $this->ImageController->LoadTexturesDirectory('textures'); //Поверхности
        $this->ImageController->LoadTexturesDirectory('objects/Ship1/Textures'); //Кораблик

        $this->LC = new LevelController($agk, $this->Core3D, $this->ImageController); //Грузим уровень

        $this->SC = new ShipController($agk, $this->Core3D, $this->ImageController, $this->KB, $this->Camera, $this, true, 1);

        $ship1 = new ShipController($agk, $this->Core3D, $this->ImageController, $this->KB, $this->Camera, $this, false, 0);
        $ship1->SetPivotPosition([ 1500, 75, 1495 ]);

        $ship2 = new ShipController($agk, $this->Core3D, $this->ImageController, $this->KB, $this->Camera, $this, false, 2);
        $ship2->SetPivotPosition([ 1495, 75, 1500 ]);

        /*$c3d = $this->Core3D;
        $thread = new Thread(function () use ($agk, $c3d){
            while(true){
                sleep(1);
                $box = $c3d->CreateBox();
                $box->SetPosition([rand(0, 6000), rand(0, 120), rand(0, 6000)]);
            }
        });
        $thread->setDaemon(true);
        $thread->start();*/

        $this->Prepare = true;
        $this->AppGameKit->DeleteSprite($fon);
    }

    public function Loop()
    {
        $time = \php\time\Time::millis();
        $agk = $this->AppGameKit;
        $this->LC->Update();
        $this->SC->Update();
        $this->Core3D->ParticlesSync();
        $agk->Sync();
        $this->deltaTime = (\php\time\Time::millis() - $time)/100;
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new index3D(1920, 1080);

//UXApplication::launch(function (UXForm $form) {
//    /** @var index3D $App */
//    global $LabelShip, $App;
//    $form->title = 'Form';
//    $form->size = [500, 500];
//    $form->x = 0;
//    $form->show();
//    $label = new UXLabel();
//    $label->text = "Launch...";
//    $label->position = [10, 10];
//    $label->font = new \php\gui\text\UXFont(18, "Arial");
//    $label->textColor = "black";
//    $form->add($label);
//    $LabelShip = $label;
//    $thread = new Thread(function () use ($form) {
//        $App = new index3D(1280, 720);
//    });
//    $thread->setDaemon(true);
//    $thread->start();
//
//    var_dump("Wait APP!");
//    while ($App == null) {
//        usleep(500000);
//    }
//    var_dump("Wait prepare!");
//    while ($App->Prepare == false) {
//    }
//    var_dump("Complete!");
//
//    $button = new UXButton();
//    $button->size = [100, 25];
//    $button->position = [10, 50];
//    $button->text = "NewBox";
//    $button->on('click', function (){
//        global $App;
//        /** @var Core3D $core3D */
//        $core3D = $App->Core3D;
//        $core3D->CreateBox([4,4,4]);
//    });
//    $form->add($button);
//
//});

