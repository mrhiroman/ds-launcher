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
        pre('Ошибка загрузки! Перезапустите лаунчер от имени администратора. Если это не поможет, проверьте антивирус.');
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
    $this->label5->text = '';
    //$this->image6->enabled = false;
    //$this->image7->enabled = true;
    $this->label3->text = $a;
    $this->label5->text = '';
    file_put_contents('localmajor.txt',$a);
    file_put_contents('localpatches.txt',0);
    $patch1 = file_get_contents("http://demonslayers.ml/files/patchlist.txt");
    $patch2 = file_get_contents('localpatches.txt');
    if ($patch2 == $patch1){
        
    } else {
          for ($cher = 1; $cher <= ($patch1 + 1); $cher++){
          $this->downloaderAlt->urls .= 'http://hiromanserv.7m.pl/' . $cher .'.zip';
          $this->textArea->text .= 'http://hiromanserv.7m.pl/' . $cher .'.zip';
          }
          $this->downloaderAlt->start();
          $this->label5->text = 'Загрузка патчей...';
          $kek = 1;
    }
    }


    /**
     * @event downloaderAlt.successAll 
     */
    function doDownloaderAltSuccessAll(ScriptEvent $e = null)
    {    
    //$this->label5->text = 'Распаковка архива...';
    //$path = fs::abs('./');
    //$this->zipFileAlt->path = $cher . '.zip';
    //$this->zipFileAlt->unpack($path);
    }

    /**
     * @event zipFileAlt.unpackAll 
     */
    function doZipFileAltUnpackAll(ScriptEvent $e = null)
    {    
        if ($kek = 1){
        pre ('Обновление завершено!');
        $this->label5->text = '';
        }
    }

    /**
     * @event downloaderAlt.errorOne 
     */
    function doDownloaderAltErrorOne(ScriptEvent $e = null)
    {    
        pre('чота не так');
    }

    /**
     * @event downloaderAlt.successOne 
     */
    function doDownloaderAltSuccessOne(ScriptEvent $e = null)
    {    
        $this->label5->text = 'Распаковка архива...';
        $path = fs::abs('./');
        $this->zipFileAlt->path = $cher . '.zip';
        $this->zipFileAlt->unpack($path);
    }



}
