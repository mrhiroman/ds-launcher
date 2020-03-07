<?php
namespace app\forms;

use php\desktop\Mouse;
use std, gui, framework, app;


class MainForm extends AbstractForm
{

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
    global $a, $b, $c;
        $d = file_get_contents("https://www.ascensiongamedev.com/resources/status.php?host=193.124.58.49&port=5400");
        if($d == '-1'){
        $this->label12->text = 'Оффлайн'; 
        } else {
        $this->label12->text = 'Онлайн';
        $this->label14->text = $d;
        }
        $c = 1;
        $a = file_get_contents("http://demonslayers.ml/files/dsver.txt");
        $this->label4->text = $a;
        if(file_exists("localmajor.txt"))
        {
        $b = file_get_contents("localmajor.txt");
        $b1 = file_get_contents("localpatches.txt");
        $this->label3->text = $b;
        } else 
        {
        file_put_contents("localmajor.txt",0);
        //app()->shutdown();
        }
        if($a == $b)
        {
            $patch1 = file_get_contents("http://demonslayers.ml/files/patchlist.txt");
            $patch2 = file_get_contents('localpatches.txt');
            if ($patch2 == $patch1){
        
            } else {
          for ($cher = 1; $cher <= ($patch1 + 2); $cher++){
          $this->downloaderAlt->urls .= 'http://hiromanserv.7m.pl/' . $cher .'.zip
          ';
          $this->textArea->text .= 'http://hiromanserv.7m.pl/' . $cher .'.zip
          ';
          }
          $this->downloaderAlt->start();
          $this->label5->text = 'Загрузка патчей (' . ($cher - 1) . ')...';
          $kek = 1;
            }
            //$this->image7->enabled = true;
        } else 
        {
          $this->downloader->urls = "http://hiromanserv.7m.pl/Client.zip";
          $this->downloader->start();
          $this->label5->text = 'Загрузка последней версии...';
          //$this->image6->enabled = false;
        }
        $timer = Timer::every(7500, function () 
        {
        global $c;
        if($c == 1) 
        {
        $this->image3->visible = false;
        $this->imageAlt->visible = true;
        $c = 2;
        } else {
        if($c == 2) 
        {
        $this->imageAlt->visible = false;
        $this->image3->visible = true;
        $c = 1;
        }
        }
        });
    }




    /**
     * @event image3.click-Left 
     */
    function doImage3ClickLeft(UXMouseEvent $e = null)
    {    
        $this->image3->visible = false;
        $this->imageAlt->visible = true;
    }

    /**
     * @event imageAlt.click-Left 
     */
    function doImageAltClickLeft(UXMouseEvent $e = null)
    {    
        $this->imageAlt->visible = false;
        $this->image3->visible = true;
    }

    /**
     * @event image5.click-Left 
     */
    function doImage5ClickLeft(UXMouseEvent $e = null)
    {
        
        
        // Generated
        $e = $event ?: $e; // legacy code from 16 rc-2
        
        app()->shutdown();
    }


    /**
     * @event image7.click-Left 
     */
    function doImage7ClickLeft(UXMouseEvent $e = null)
    {    
         execute("Demon Slayers.exe");
    }

    /**
     * @event image8.click-Left 
     */
    function doImage8ClickLeft(UXMouseEvent $e = null)
    {
        
        
        // Generated
        $e = $event ?: $e; // legacy code from 16 rc-2
        
        browse('http://vk.com/demslayers');
    }

    /**
     * @event image9.click-Left 
     */
    function doImage9ClickLeft(UXMouseEvent $e = null)
    {    
        browse('http://discord.gg/afqmUgq');
    }

    /**
     * @event image10.click-Left 
     */
    function doImage10ClickLeft(UXMouseEvent $e = null)
    {
        
        
        // Generated
        $e = $event ?: $e; // legacy code from 16 rc-2
        
        app()->showForm('settings');
    }





}
