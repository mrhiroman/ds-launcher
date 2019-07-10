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
    $c = 1;
        $a = file_get_contents("http://demonslayers.ml/files/dsver.txt");
        $this->label4->text = $a;
        if(file_exists("localver.txt"))
        {
        $b = file_get_contents("localver.txt");
        $this->label3->text = $b;
        } else 
        {
        file_put_contents("localver.txt",0);
        //app()->shutdown();
        }
        if($a == $b)
        {
            $this->image7->enabled = true;
        } else 
        {
          $this->image6->enabled = true;
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
     * @event image6.click-Left 
     */
    function doImage6ClickLeft(UXMouseEvent $e = null)
    {    
        $this->downloader->start();
        $this->label5->text = 'Загрузка обновления...';
        $this->image6->enabled = false;
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
