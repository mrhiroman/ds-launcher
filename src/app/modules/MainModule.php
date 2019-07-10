<?php
namespace app\modules;

use Exception;
use php\compress\ZipFile;
use std, gui, framework, app;


class MainModule extends AbstractModule
{

    /**
     * @event downloader.successAll 
     */
    function doDownloaderSuccessAll(ScriptEvent $e = null)
    {    
    $this->label5->text = 'Распаковка архива...';
    $path = fs::abs('./');
    $this->zipFile->unpack($path);
    }

    /**
     * @event downloader.errorOne 
     */
    function doDownloaderErrorOne(ScriptEvent $e = null)
    {    
        pre('Ошибка загрузки! Возможно, сервер недоступен.');
        $this->button->enabled = true;
    }

    /**
     * @event zipFile.unpackAll 
     */
    function doZipFileUnpackAll(ScriptEvent $e = null)
    {    
    global $a, $b;
    pre('Обновление завершено!');
    $this->image6->enabled = false;
    $this->image7->enabled = true;
    $this->label3->text = $a;
    $this->label5->text = '';
    file_put_contents('localver.txt',$a);
    }

    /**
     * @event zipFile.unpackAll 
     */
    function doZipFileUnpackAll(ScriptEvent $e = null)
    {    
    global $a, $b;
    pre('Обновление завершено!');
    $this->label5->text = '';
    $this->image6->enabled = false;
    $this->image7->enabled = true;
    $this->label3->text = $a;
    $this->label5->text = '';
    file_put_contents('localver.txt',$a);
    }



}
