<?php

use fibonaccifox\AppGameKit;
use MarbleUI\modules\Text;

class App
{

    public AppGameKit $AppGameKit;
    public Text $Text;
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
        $agk->SetPrintColor(0, 0, 0, 190);
        $agk->UseNewDefaultFonts(1);
        $agk->SetPrintSize(40);

        $Text = new Text($agk);
        $Text->text = "Анимация";
        $Text->size = 25;
        $Text->position = [150, 150];
        $Text->colorAlpha = 1;
        $Text->colorBlue = 80;

        $this->Text = $Text;




    }

    public function Loop()
    {

        $agk = $this->AppGameKit;
        //$agk->Print("HelloWorld!");
        //$agk->Print("FPS: " . $this->AppGameKit->ScreenFPS());

        $this->Text->colorAlpha +=1;
        $b = $agk->MakeColor(0, 136, 255);

        $agk->DrawBox(500, 50, 650, 150, $b, $b, $b, $b, 1);
        $agk->Sync();
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new App();











