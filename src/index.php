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
        $agk->SetPrintSize(20);


        $this->text = new Text($agk);
        $this->text->text = "БУМАГА";
        $this->text->size = 40;
        $this->text->position = [80, 100];
        $this->text->colorAlpha = 180;
        $this->text->alignment = 1;


    }

    public function Loop()
    {

        $agk = $this->AppGameKit;
        $agk->Print("X pos Text: " . $this->text->x . ' ' . $this->text->fixToScreen);
        $this->text->angle = 90;
        $this->text->x += 1;
        $this->text->colorAlpha -= 6;

        $agk->Sync();
    }

    public function End()
    {
        var_dump("End!");
        exit;
    }
}

$App = new App();











