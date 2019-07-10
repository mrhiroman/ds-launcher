<?php
namespace app\forms;

use std, gui, framework, app;


class settings extends AbstractForm
{

    /**
     * @event imageAlt.click-Left 
     */
    function doImageAltClickLeft(UXMouseEvent $e = null)
    {    
        app()->hideForm('settings');
    }

    /**
     * @event image4.click-Left 
     */
    function doImage4ClickLeft(UXMouseEvent $e = null)
    {    
        file_put_contents("localver.txt",0);
        message("Игра готова к переустановке. Перезапустите лаунчер.");
        app()->shutdown();
    }

    /**
     * @event label4.click-Left 
     */
    function doLabel4ClickLeft(UXMouseEvent $e = null)
    {    
        file_put_contents("localver.txt",0);
        message("Игра готова к переустановке. Перезапустите лаунчер.");
        app()->shutdown();
    }

}
