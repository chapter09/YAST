<?php  
class TinyMceHelper extends AppHelper 
{ 
     
    // Take advantage of other helpers 
    var $helpers = array('Javascript', 'Form'); 
    // Check if the tiny_mce.js file has been added or not 
    var $_script = false; 
     
    /** 
     * Adds the tiny_mce.js file and constructs the options 
     * 
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated 
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea 
     * @return string JavaScript code to initialise the TinyMCE area 
     */ 
    function _build($fieldName, $tinyoptions = array()) 
    { 
        if(!$this->_script) 
        { 
            // We don't want to add this every time, it's only needed once 
            $this->_script = true; 
            $this->Javascript->link('tiny_mce/tiny_mce', false); 
        } 
        // Ties the options to the field 
        $tinyoptions['mode'] = 'exact'; 
        $tinyoptions['elements'] = $this->domId($fieldName);  
        return $this->Javascript->codeBlock('tinyMCE.init(' . $this->Javascript->object($tinyoptions) . ');'); 
    } 
     
    /** 
     * Creates a TinyMCE textarea. 
     * 
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated 
     * @param array $options Array of HTML attributes. 
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea 
     * @return string An HTML textarea element with TinyMCE 
     */ 
    function textarea($fieldName, $options = array(), $tinyoptions = array(), $preset = null) 
    { 
        // If a preset is defined 
        if(!empty($preset)) 
        { 
            $preset_options = $this->preset($preset); 
             
            // If $preset_options && $tinyoptions are an array 
            if(is_array($preset_options) && is_array($tinyoptions)) 
            { 
                $tinyoptions = array_merge($preset_options, $tinyoptions); 
            } 
            else 
            { 
                $tinyoptions = $preset_options; 
            } 
        } 
         
        return $this->Form->textarea($fieldName, $options) . $this->_build($fieldName, $tinyoptions); 
    } 

    /** 
     * Creates a TinyMCE textarea. 
     * 
     * @param string $fieldName Name of a field, like this "Modelname.fieldname", "Modelname/fieldname" is deprecated 
     * @param array $options Array of HTML attributes. 
     * @param array $tinyoptions Array of TinyMCE attributes for this textarea 
     * @return string An HTML textarea element with TinyMCE 
     */ 
    function input($fieldName, $options = array(), $tinyoptions = array(), $preset = null) 
    { 
        // If a preset is defined 
        if(!empty($preset)) 
        { 
            $preset_options = $this->preset($preset); 
             
            // If $preset_options && $tinyoptions are an array 
            if(is_array($preset_options) && is_array($tinyoptions)) 
            { 
                $tinyoptions = array_merge($preset_options, $tinyoptions); 
            } 
            else 
            { 
                $tinyoptions = $preset_options; 
            } 
        } 
         
        $options['type'] = 'textarea';
        return $this->Form->input($fieldName, $options) . $this->_build($fieldName, $tinyoptions); 
    } 
     
    /** 
     * Creates a preset for TinyOptions 
     *  
     * @param string $name 
     * @return array 
     */ 
    private function preset($name) 
    { 
        // Full Feature 
        if($name == 'full') 
        { 
            return array( 
                'theme' => 'advanced', 
                'plugins' => 'safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
                'theme_advanced_buttons1' => 'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect',
                'theme_advanced_buttons2' => 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
                'theme_advanced_buttons3' => 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
                'theme_advanced_buttons4' => 'insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak',
                'theme_advanced_toolbar_location' => 'top', 
                'theme_advanced_toolbar_align' => 'left', 
                'theme_advanced_statusbar_location' => 'bottom', 
                'theme_advanced_resizing' => true, 
                'theme_advanced_resize_horizontal' => false, 
                'convert_fonts_to_spans' => true 
            ); 
        } 
   
        // Basic 
        if($name == 'basic') 
        { 
            return array( 
                'theme' => 'advanced', 
                'theme_advanced_toolbar_location' => 'top', 
                'theme_advanced_toolbar_align' => 'left', 
                'theme_advanced_statusbar_location' => 'bottom', 
                'theme_advanced_resizing' => true, 
                'theme_advanced_resize_horizontal' => false, 
                'convert_fonts_to_spans' => true 
            ); 
        } 
         
        // BBCode 
        if($name == 'bbcode') 
        { 
            return array( 
                'theme' => 'advanced', 
                'plugins' => 'bbcode', 
                'theme_advanced_buttons1' => 'bold,italic,underline,undo,redo,link,unlink,image,forecolor,styleselect,removeformat,cleanup,code',
                'theme_advanced_buttons2' => '', 
                'theme_advanced_buttons3' => '', 
                'theme_advanced_toolbar_location' => 'top', 
                'theme_advanced_toolbar_align' => 'left', 
                'theme_advanced_styles' => 'Code=codeStyle;Quote=quoteStyle', 
                'theme_advanced_statusbar_location' => 'bottom', 
                'theme_advanced_resizing' => true, 
                'theme_advanced_resize_horizontal' => false, 
                'entity_encoding' => 'raw', 
                'add_unload_trigger' => false, 
                'remove_linebreaks' => false, 
                'inline_styles' => false 
            ); 
        } 
         
        return null; 
    } 
} 
?>
