<?php

use fibonaccifox\AppGameKit;
use MarbleUI\modules\Text;
use \MarbleUI\modules\Core3D;

class index3D
{
    public AppGameKit $AppGameKit;
    private Core3D $Core3D;

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

        $this->Core3D = new Core3D($agk);
        $box = $this->Core3D->CreateBox();
        $box->position = [0,0,0];
    }

    public function Loop()
    {
        $agk = $this->AppGameKit;
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

$App = new index3D();
