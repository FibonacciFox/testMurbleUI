<?php


namespace MarbleUI\modules\Misc;


use fibonaccifox\AppGameKit;
use fibonaccifox\helpers\Key;

/**
 * Класс работы с клавиатурой
 *
 * Class KeyBoardController
 *
 * @package MarbleUI\modules\Misc\KeyBoardController
 *
 * @author  ElGenKa
 * @version 1.0.0;
 */
class KeyBoardController
{

    public AppGameKit $AppGameKit;

    public function __construct(AppGameKit $AppGameKit)
    {
        $this->AppGameKit = $AppGameKit;
    }

    public function F1()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F1);
    }

    public function F1_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F1);
    }

    public function F1_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F1);
    }

    public function F2()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F2);
    }

    public function F2_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F2);
    }

    public function F2_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F2);
    }

    public function F3()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F3);
    }

    public function F3_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F3);
    }

    public function F3_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F3);
    }

    public function F4()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F4);
    }

    public function F4_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F4);
    }

    public function F4_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F4);
    }

    public function F5()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F5);
    }

    public function F5_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F5);
    }

    public function F5_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F5);
    }

    public function F6()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F6);
    }

    public function F6_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F6);
    }

    public function F6_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F6);
    }

    public function F7()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F7);
    }

    public function F7_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F7);
    }

    public function F7_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F7);
    }

    public function F8()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F8);
    }

    public function F8_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F8);
    }

    public function F8_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F8);
    }

    public function F9()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F9);
    }

    public function F9_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F9);
    }

    public function F9_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F9);
    }

    public function F10()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F10);
    }

    public function F10_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F10);
    }

    public function F10_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F10);
    }

    public function F11()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F11);
    }

    public function F11_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F11);
    }

    public function F11_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F11);
    }

    public function F12()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F12);
    }

    public function F12_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F12);
    }

    public function F12_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F12);
    }

    public function Key0()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY0);
    }

    public function Key0_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY0);
    }

    public function Key0_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY0);
    }

    public function Key1()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY1);
    }

    public function Key1_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY1);
    }

    public function Key1_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY1);
    }

    public function Key2()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY2);
    }

    public function Key2_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY2);
    }

    public function Key2_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY2);
    }

    public function Key3()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY3);
    }

    public function Key3_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY3);
    }

    public function Key3_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY3);
    }

    public function Key4()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY4);
    }

    public function Key4_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY4);
    }

    public function Key4_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY4);
    }

    public function Key5()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY5);
    }

    public function Key5_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY5);
    }

    public function Key5_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY5);
    }

    public function Key6()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY6);
    }

    public function Key6_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY6);
    }

    public function Key6_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY6);
    }

    public function Key7()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY7);
    }

    public function Key7_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY7);
    }

    public function Key7_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY7);
    }

    public function Key8()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY8);
    }

    public function Key8_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY8);
    }

    public function Key8_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY8);
    }

    public function Key9()
    {
        return $this->AppGameKit->GetRawKeyState(Key::KEY9);
    }

    public function Key9_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::KEY9);
    }

    public function Key9_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::KEY9);
    }

    public function ESC()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ESC);
    }

    public function ESC_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ESC);
    }

    public function ESC_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ESC);
    }

    public function BACKSPACE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::BACKSPACE);
    }

    public function BACKSPACE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::BACKSPACE);
    }

    public function BACKSPACE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::BACKSPACE);
    }

    public function TAB()
    {
        return $this->AppGameKit->GetRawKeyState(Key::TAB);
    }

    public function TAB_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::TAB);
    }

    public function TAB_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::TAB);
    }

    public function CAPSLOCK()
    {
        return $this->AppGameKit->GetRawKeyState(Key::CAPSLOCK);
    }

    public function CAPSLOCK_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::CAPSLOCK);
    }

    public function CAPSLOCK_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::CAPSLOCK);
    }

    public function SHIFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SHIFT);
    }

    public function SHIFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SHIFT);
    }

    public function SHIFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SHIFT);
    }

    public function SHIFT_LEFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SHIFT_LEFT);
    }

    public function SHIFT_LEFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SHIFT_LEFT);
    }

    public function SHIFT_LEFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SHIFT_LEFT);
    }

    public function SHIFT_RIGHT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SHIFT_RIGHT);
    }

    public function SHIFT_RIGHT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SHIFT_RIGHT);
    }

    public function SHIFT_RIGHT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SHIFT_RIGHT);
    }

    public function CTRL()
    {
        return $this->AppGameKit->GetRawKeyState(Key::CTRL);
    }

    public function CTRL_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::CTRL);
    }

    public function CTRL_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::CTRL);
    }

    public function CTRL_LEFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::CTRL_LEFT);
    }

    public function CTRL_LEFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::CTRL_LEFT);
    }

    public function CTRL_LEFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::CTRL_LEFT);
    }

    public function CTRL_RIGHT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::CTRL_RIGHT);
    }

    public function CTRL_RIGHT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::CTRL_RIGHT);
    }

    public function CTRL_RIGHT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::CTRL_RIGHT);
    }

    public function WIN_LEFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::WIN_LEFT);
    }

    public function WIN_LEFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::WIN_LEFT);
    }

    public function WIN_LEFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::WIN_LEFT);
    }

    public function WIN_RIGHT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::WIN_RIGHT);
    }

    public function WIN_RIGHT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::WIN_RIGHT);
    }

    public function WIN_RIGHT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::WIN_RIGHT);
    }

    public function ALT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ALT);
    }

    public function ALT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ALT);
    }

    public function ALT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ALT);
    }

    public function ALT_LEFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ALT_LEFT);
    }

    public function ALT_LEFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ALT_LEFT);
    }

    public function ALT_LEFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ALT_LEFT);
    }

    public function ALT_RIGHT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ALT_RIGHT);
    }

    public function ALT_RIGHT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ALT_RIGHT);
    }

    public function ALT_RIGHT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ALT_RIGHT);
    }

    public function SPACE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SPACE);
    }

    public function SPACE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SPACE);
    }

    public function SPACE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SPACE);
    }

    public function ENTER()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ENTER);
    }

    public function ENTER_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ENTER);
    }

    public function ENTE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ENTER);
    }

    public function MENU()
    {
        return $this->AppGameKit->GetRawKeyState(Key::MENU);
    }

    public function MENU_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::MENU);
    }

    public function MENU_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::MENU);
    }

    public function PRINT_SCREEN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::PRINT_SCREEN);
    }

    public function PRINT_SCREEN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::PRINT_SCREEN);
    }

    public function PRINT_SCREEN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::PRINT_SCREEN);
    }

    public function SCROLL_LOCK()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SCROLL_LOCK);
    }

    public function SCROLL_LOCK_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SCROLL_LOCK);
    }

    public function SCROLL_LOCK_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SCROLL_LOCK);
    }

    public function PAUSE_BREACK()
    {
        return $this->AppGameKit->GetRawKeyState(Key::PAUSE_BREACK);
    }

    public function PAUSE_BREACK_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::PAUSE_BREACK);
    }

    public function PAUSE_BREACK_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::PAUSE_BREACK);
    }

    public function INSERT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::INSERT);
    }

    public function INSERT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::INSERT);
    }

    public function INSERT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::INSERT);
    }

    public function HOME()
    {
        return $this->AppGameKit->GetRawKeyState(Key::HOME);
    }

    public function HOME_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::HOME);
    }

    public function HOME_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::HOME);
    }

    public function PAGE_UP()
    {
        return $this->AppGameKit->GetRawKeyState(Key::PAGE_UP);
    }

    public function PAGE_UP_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::PAGE_UP);
    }

    public function PAGE_UP_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::PAGE_UP);
    }

    public function PAGE_DOWN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::PAGE_DOWN);
    }

    public function PAGE_DOWN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::PAGE_DOWN);
    }

    public function PAGE_DOWN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::PAGE_DOWN);
    }

    public function DELETE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::DELETE);
    }

    public function DELETE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::DELETE);
    }

    public function DELETE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::DELETE);
    }

    public function END()
    {
        return $this->AppGameKit->GetRawKeyState(Key::END);
    }

    public function END_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::END);
    }

    public function END_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::END);
    }

    public function LEFT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::LEFT);
    }

    public function LEFT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::LEFT);
    }

    public function LEFT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::LEFT);
    }

    public function RIGHT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::RIGHT);
    }

    public function RIGHT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::RIGHT);
    }

    public function RIGHT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::RIGHT);
    }

    public function UP()
    {
        return $this->AppGameKit->GetRawKeyState(Key::UP);
    }

    public function UP_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::UP);
    }

    public function UP_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::UP);
    }

    public function DOWN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::DOWN);
    }

    public function DOWN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::DOWN);
    }

    public function DOWN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::DOWN);
    }

    public function KeyA()
    {
        return $this->AppGameKit->GetRawKeyState(Key::A);
    }

    public function KeyA_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::A);
    }

    public function KeyA_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::A);
    }

    public function KeyB()
    {
        return $this->AppGameKit->GetRawKeyState(Key::B);
    }

    public function KeyB_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::B);
    }

    public function KeyB_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::B);
    }

    public function KeyC()
    {
        return $this->AppGameKit->GetRawKeyState(Key::C);
    }

    public function KeyC_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::C);
    }

    public function KeyC_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::C);
    }

    public function KeyD()
    {
        return $this->AppGameKit->GetRawKeyState(Key::D);
    }

    public function KeyD_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::D);
    }

    public function KeyD_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::D);
    }

    public function KeyE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::E);
    }

    public function KeyE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::E);
    }

    public function KeyE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::E);
    }

    public function KeyF()
    {
        return $this->AppGameKit->GetRawKeyState(Key::F);
    }

    public function KeyF_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::F);
    }

    public function KeyF_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::F);
    }

    public function KeyG()
    {
        return $this->AppGameKit->GetRawKeyState(Key::G);
    }

    public function KeyG_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::G);
    }

    public function KeyG_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::G);
    }

    public function KeyH()
    {
        return $this->AppGameKit->GetRawKeyState(Key::H);
    }

    public function KeyH_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::H);
    }

    public function KeyH_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::H);
    }

    public function KeyI()
    {
        return $this->AppGameKit->GetRawKeyState(Key::I);
    }

    public function KeyI_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::I);
    }

    public function KeyI_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::I);
    }

    public function KeyJ()
    {
        return $this->AppGameKit->GetRawKeyState(Key::J);
    }

    public function KeyJ_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::J);
    }

    public function KeyJ_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::J);
    }

    public function KeyK()
    {
        return $this->AppGameKit->GetRawKeyState(Key::K);
    }

    public function KeyK_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::K);
    }

    public function KeyK_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::K);
    }

    public function KeyL()
    {
        return $this->AppGameKit->GetRawKeyState(Key::L);
    }

    public function KeyL_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::L);
    }

    public function KeyL_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::L);
    }

    public function KeyM()
    {
        return $this->AppGameKit->GetRawKeyState(Key::M);
    }

    public function KeyM_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::M);
    }

    public function KeyM_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::M);
    }

    public function KeyN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::N);
    }

    public function KeyN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::N);
    }

    public function KeyN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::N);
    }

    public function KeyO()
    {
        return $this->AppGameKit->GetRawKeyState(Key::O);
    }

    public function KeyO_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::O);
    }

    public function KeyO_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::O);
    }

    public function KeyP()
    {
        return $this->AppGameKit->GetRawKeyState(Key::P);
    }

    public function KeyP_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::P);
    }

    public function KeyP_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::P);
    }

    public function KeyQ()
    {
        return $this->AppGameKit->GetRawKeyState(Key::Q);
    }

    public function KeyQ_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::Q);
    }

    public function KeyQ_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::Q);
    }

    public function KeyR()
    {
        return $this->AppGameKit->GetRawKeyState(Key::R);
    }

    public function KeyR_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::R);
    }

    public function KeyR_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::R);
    }

    public function KeyS()
    {
        return $this->AppGameKit->GetRawKeyState(Key::S);
    }

    public function KeyS_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::S);
    }

    public function KeyS_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::S);
    }

    public function KeyT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::T);
    }

    public function KeyT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::T);
    }

    public function KeyT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::T);
    }

    public function KeyU()
    {
        return $this->AppGameKit->GetRawKeyState(Key::U);
    }

    public function KeyU_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::U);
    }

    public function KeyU_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::U);
    }

    public function KeyV()
    {
        return $this->AppGameKit->GetRawKeyState(Key::V);
    }

    public function KeyV_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::V);
    }

    public function KeyV_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::V);
    }

    public function KeyW()
    {
        return $this->AppGameKit->GetRawKeyState(Key::W);
    }

    public function KeyW_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::W);
    }

    public function KeyW_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::W);
    }

    public function KeyX()
    {
        return $this->AppGameKit->GetRawKeyState(Key::X);
    }

    public function KeyX_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::X);
    }

    public function KeyX_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::X);
    }

    public function KeyY()
    {
        return $this->AppGameKit->GetRawKeyState(Key::Y);
    }

    public function KeyY_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::Y);
    }

    public function KeyY_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::Y);
    }

    public function KeyZ()
    {
        return $this->AppGameKit->GetRawKeyState(Key::Z);
    }

    public function KeyZ_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::Z);
    }

    public function KeyZ_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::Z);
    }

    public function NUM_LOCK()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_LOCK);
    }

    public function NUM_LOCK_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_LOCK);
    }

    public function NUM_LOCK_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_LOCK);
    }

    public function NUM_PAD0()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD0);
    }

    public function NUM_PAD0_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD0);
    }

    public function NUM_PAD0_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD0);
    }

    public function NUM_PAD1()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD1);
    }

    public function NUM_PAD1_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD1);
    }

    public function NUM_PAD1_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD1);
    }

    public function NUM_PAD2()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD2);
    }

    public function NUM_PAD2_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD2);
    }

    public function NUM_PAD2_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD2);
    }

    public function NUM_PAD3()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD3);
    }

    public function NUM_PAD3_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD3);
    }

    public function NUM_PAD3_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD3);
    }

    public function NUM_PAD4()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD4);
    }

    public function NUM_PAD4_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD4);
    }

    public function NUM_PAD4_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD4);
    }

    public function NUM_PAD5()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD5);
    }

    public function NUM_PAD5_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD5);
    }

    public function NUM_PAD5_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD5);
    }

    public function NUM_PAD6()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD6);
    }

    public function NUM_PAD6_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD6);
    }

    public function NUM_PAD6_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD6);
    }

    public function NUM_PAD7()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD7);
    }

    public function NUM_PAD7_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD7);
    }

    public function NUM_PAD7_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD7);
    }

    public function NUM_PAD8()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD8);
    }

    public function NUM_PAD8_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD8);
    }

    public function NUM_PAD8_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD8);
    }

    public function NUM_PAD9()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD9);
    }

    public function NUM_PAD9_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD9);
    }

    public function NUM_PAD9_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD9);
    }

    public function NUM_PAD_STAR()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD_STAR);
    }

    public function NUM_PAD_STAR_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD_STAR);
    }

    public function NUM_PAD_STAR_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD_STAR);
    }

    public function NUM_PAD_PLUS()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD_PLUS);
    }

    public function NUM_PAD_PLUS_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD_PLUS);
    }

    public function NUM_PAD_PLUS_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD_PLUS);
    }

    public function NUM_PAD_MINUS()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD_MINUS);
    }

    public function NUM_PAD_MINUS_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD_MINUS);
    }

    public function NUM_PAD_MINUS_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD_MINUS);
    }

    public function NUM_PAD_POINT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD_POINT);
    }

    public function NUM_PAD_POINT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD_POINT);
    }

    public function NUM_PAD_POINT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD_POINT);
    }

    public function NUM_PAD_SEPARATOR()
    {
        return $this->AppGameKit->GetRawKeyState(Key::NUM_PAD_SEPARATOR);
    }

    public function NUM_PAD_SEPARATOR_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::NUM_PAD_SEPARATOR);
    }

    public function NUM_PAD_SEPARATOR_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::NUM_PAD_SEPARATOR);
    }

    public function SEMICOLON()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SEMICOLON);
    }

    public function SEMICOLON_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SEMICOLON);
    }

    public function SEMICOLON_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SEMICOLON);
    }

    public function COLON()
    {
        return $this->AppGameKit->GetRawKeyState(Key::COLON);
    }

    public function COLON_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::COLON);
    }

    public function COLON_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::COLON);
    }

    public function EQUALLY()
    {
        return $this->AppGameKit->GetRawKeyState(Key::EQUALLY);
    }

    public function EQUALLY_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::EQUALLY);
    }

    public function EQUALLY_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::EQUALLY);
    }

    public function PLUS()
    {
        return $this->AppGameKit->GetRawKeyState(Key::PLUS);
    }

    public function PLUS_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::PLUS);
    }

    public function PLUS_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::PLUS);
    }

    public function COMMA()
    {
        return $this->AppGameKit->GetRawKeyState(Key::COMMA);
    }

    public function COMMA_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::COMMA);
    }

    public function COMMA_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::COMMA);
    }

    public function ANGLE_BRACKET_OPEN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ANGLE_BRACKET_OPEN);
    }

    public function ANGLE_BRACKET_OPEN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ANGLE_BRACKET_OPEN);
    }

    public function ANGLE_BRACKET_OPEN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ANGLE_BRACKET_OPEN);
    }

    public function MINUS()
    {
        return $this->AppGameKit->GetRawKeyState(Key::MINUS);
    }

    public function MINUS_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::MINUS);
    }

    public function MINUS_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::MINUS);
    }

    public function UNDERLINE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::UNDERLINE);
    }

    public function UNDERLINE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::UNDERLINE);
    }

    public function UNDERLINE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::UNDERLINE);
    }

    public function ANGLE_BRACKET_CLOSE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::ANGLE_BRACKET_CLOSE);
    }

    public function ANGLE_BRACKET_CLOSE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::ANGLE_BRACKET_CLOSE);
    }

    public function ANGLE_BRACKET_CLOSE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::ANGLE_BRACKET_CLOSE);
    }

    public function POINT()
    {
        return $this->AppGameKit->GetRawKeyState(Key::POINT);
    }

    public function POINT_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::POINT);
    }

    public function POINT_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::POINT);
    }

    public function SLASH()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SLASH);
    }

    public function SLASH_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SLASH);
    }

    public function SLASH_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SLASH);
    }

    public function QUESTION()
    {
        return $this->AppGameKit->GetRawKeyState(Key::QUESTION);
    }

    public function QUESTION_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::QUESTION);
    }

    public function QUESTION_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::QUESTION);
    }

    public function TILDE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::TILDE);
    }

    public function TILDE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::TILDE);
    }

    public function TILDE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::TILDE);
    }

    public function SQUARE_BRACKET_OPEN()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SQUARE_BRACKET_OPEN);
    }

    public function SQUARE_BRACKET_OPEN_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SQUARE_BRACKET_OPEN);
    }

    public function SQUARE_BRACKET_OPEN_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SQUARE_BRACKET_OPEN);
    }

    public function SQUARE_BRACKET_CLOSE()
    {
        return $this->AppGameKit->GetRawKeyState(Key::SQUARE_BRACKET_CLOSE);
    }

    public function SQUARE_BRACKET_CLOSE_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::SQUARE_BRACKET_CLOSE);
    }

    public function SQUARE_BRACKET_CLOSE_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::SQUARE_BRACKET_CLOSE);
    }

    public function BACK_SLASH()
    {
        return $this->AppGameKit->GetRawKeyState(Key::BACK_SLASH);
    }

    public function BACK_SLASH_Pressed()
    {
        return $this->AppGameKit->GetRawKeyPressed(Key::BACK_SLASH);
    }

    public function BACK_SLASH_Released()
    {
        return $this->AppGameKit->GetRawKeyReleased(Key::BACK_SLASH);
    }

}