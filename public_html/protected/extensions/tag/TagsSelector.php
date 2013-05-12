<?php

class TagsSelector extends CTabView
{
    public $cssFiles = array();
    public $jsFiles = array();
    
    public function init()
    {
        if($this->cssFile===null)
        {
            $this->cssFiles[]='http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css';
            $this->cssFiles[]=Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'/css/jquery.tagit.css');
            $this->cssFiles[]=Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'/css/tagit.ui-zendesk.css');
            
            $this->jsFiles[]='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js';
            $this->jsFiles[]='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js';
            $this->jsFiles[]=Yii::app()->getAssetManager()->publish(dirname(__FILE__).DIRECTORY_SEPARATOR.'/js/tag-it.js');
        }
        parent::init();
        
        $this->registerClientScript();
        
        ob_start();
    }
    
    public function run()
    {
        $content = ob_get_contents();ob_end_clean();
        
        echo $content;
    }
    
    public function registerClientScript()
    {
        $cs=Yii::app()->clientScript;
        
        if(count($this->cssFiles) > 0) {
            foreach($this->cssFiles as $file) {
                $cs->registerCssFile($file);
            }
        }
        
        if(count($this->jsFiles) > 0) {
            foreach($this->jsFiles as $file) {
                $cs->registerScriptFile($file);
            }
        }
    }
}
