<?php


namespace MarbleUI\modules\Misc;

use fibonaccifox\AppGameKit;

/**
 * Класс контроллер для работы с текстурами
 * По сути класс "помощник", работать можно и без него
 *
 * @author  ElGenKa
 * @version 1.0.0;
 */
class ImagesController
{
    private $agk;

    private $texturesByCode;
    private $texturesByFileName;
    private $texturesByFileId;

    private $i = 1;

    private $loadedFiles;

    public function __construct(AppGameKit $agk)
    {
        $this->agk = $agk;
    }

    /**
     * Загружает текстуру и сохраняет всю информацию о путях. Текстуре может быть присвоян символьный код, по которому
     * методом GetTextureByCode можно получить id текстуры в AGK
     *
     * @param string $file              путь до файла, без "media"
     * @param bool   $code              символьный код текстуры
     * @param bool   $setCodeByFileName если установлен в true и $code передан как false то сформирует символьный код
     *                                  исходя из базового названия файла без расширения
     *
     * @return bool|int вернет false если текстура не была загружена, либо id текстуры
     */
    public function LoadTexture($file, $code = false, $setCodeByFileName = false)
    {

        $path = $this->agk->getPath($file);
        $path = str_replace('\\', '/', $path);
        $id = $this->agk->LoadImage($path);
        $checkFile = str_replace('raw:', '', $path);
        if ($code == null and $setCodeByFileName == true) {
            $baseFileName = basename($checkFile);
            $code = explode('.', $baseFileName)[0];
        }
        if (!empty($id)) {

            $this->loadedFiles[] = $path;
            if ($code)
                $this->texturesByCode[$code] = $id;
            $this->texturesByFileName[$path] = $id;
            $this->texturesByFileId[$id] = $file;
            return $id;
        } else return false;

    }

    /**
     * Загружает все текстуры из папки (Указывать без media!). Вернет false в случае неверного пути или массив id
     *
     * @param $dir
     *
     * @return bool|array
     */
    public function LoadTexturesDirectory($dir)
    {
        $dir_link = "media/" . $dir . '/';
        $dir_data = scandir(realpath($dir_link));
        $ids = [];
        foreach ($dir_data as $file) {
            //var_dump($dir_link.$file);
            if ($file != "." and $file != "..") {
                $ids[] = $this->LoadTexture($dir . "/" . $file, false, true);
            }
        }
        return $ids;
    }

    /**
     * Возвращает id текстуры AGK по коду, либо false
     *
     * @param $code
     *
     * @return bool|int
     */
    public function GetTextureByCode($code): int
    {
        if (!empty($this->texturesByCode[$code]))
            return $this->texturesByCode[$code];
        else
            return false;
    }

    /**
     * Вернет id текстуры AGK по названию файла
     *
     * @param $fileName
     *
     * @return bool|int
     */
    public function GetTextureByFileName($fileName)
    {
        if (!empty($this->texturesByFileName[$fileName]))
            return $this->texturesByFileName[$fileName];
        else
            return false;
    }

    /**
     * Вернет название файла(путь) по id
     *
     * @param $id
     *
     * @return bool|string
     */
    public function GetFileNameById($id)
    {
        if (!empty($this->texturesByFileId[$id]))
            return $this->texturesByFileId[$id];
        else
            return false;
    }

    /**
     * Устанавливает код текстуре
     *
     * @param $idTexture
     * @param $code
     */
    public function SetCode($idTexture, $code)
    {
        $this->texturesByCode[$code] = $idTexture;
    }

    /**
     * Вернет массив со всей информации о текстурах, если передан sorted как true то объединит информацию о каждой
     * текстуре
     *
     * @param bool $sorted
     *
     * @return array
     */
    public function GetAll($sorted = false)
    {
        if ($sorted == false) {
            $data['code'] = $this->texturesByCode;
            $data['name'] = $this->texturesByFileName;
            $data['id'] = $this->texturesByFileId;
            $data['loaded'] = $this->loadedFiles;
            return $data;
        } else {
            $data = [];
            foreach ($this->loadedFiles as $fn) {
                $id = $this->texturesByFileName[$fn];
                $code = array_search($id, $this->texturesByCode);
                $baseFileName = basename($fn);
                $dataTemp['id'] = $id;
                $dataTemp['code'] = $code;
                $dataTemp['File'] = $fn;
                $dataTemp['BaseName'] = $baseFileName;
                $data[] = $dataTemp;
            }
            return $data;
        }
    }

    public function GetAllCodes()
    {
        return $this->texturesByCode;
    }

    public function GetAllFileNames()
    {
        return $this->texturesByFileName;
    }

    public function GetAllFiles()
    {
        return $this->texturesByFileId;
    }

}