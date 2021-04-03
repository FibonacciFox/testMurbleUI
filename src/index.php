<?php

use fibonaccifox\AppGameKit;
use MarbleUI\modules\Text;

class App
{

    public AppGameKit $AppGameKit;
    public Text $text;
    public float $stat = 0;

    public function __construct()
    {
        $this->AppGameKit = new AppGameKit($this);

        $agk = $this->AppGameKit;

        $agk->Init(1024, 768, false);


    }

    public function Begin()
    {

        var_dump("Begin!");
        $agk = $this->AppGameKit;
        $agk->SetWindowTitle('Hello World');
        $agk->setvirtualresolution(1024, 768);
        $agk->SetClearColor(0, 50, 0);
        //$agk->SetPrintColor(0, 0, 0, 190);
        $agk->UseNewDefaultFonts(1);
        $agk->SetPrintSize(40);


        $this->text = new Text($agk);
        $this->text->text = "БУМАГА";
        $this->text->size = 40;
        $this->text->position = [100, 100];
        $this->text->colorAlpha = 255;
        var_dump($this->text->objectId);

    }

    public function Loop()
    {

        $agk = $this->AppGameKit;
        //$agk->Print("HelloWorld!");
        $agk->Print($this->text->x);

        //$agk->Print("FPS: " . $this->AppGameKit->ScreenFPS());

        //$this->Text->colorAlpha +=1;
        $b = $agk->MakeColor(0, 136, 255);


        $agk->Sync();
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new App();











