<?php
App::import('I18n', 'I18n');
App::import('Model', 'I18nModel');
App::import('Behavior', 'Translate');
class MulitiTranslateBehavior extends TranslateBehavior {
  protected $_options = array(
      'validate' => false,
      'find' => false
  );  

  public $multiOptions = array();
  
  
  
  
  /**
   * MultiTranslateBehavior::setup()
   * 
   * @param mixed $Model
   * @param mixed $config
   * @return void
   */
  public function setup($Model, $config = array()) {
      parent::setup($Model,$config);
      
      if ( !isset( $this->multiOptions[$Model->alias] ) )
          $this->multiOptions[$Model->alias] = $this->_options;  
  }  


  /**
   * MultiTranslateBehavior::enableMultiValidate()
   * 
   * @param mixed $model
   * @return void
   */
  public function multiTranslateOptions(Model $model,$options ) {
    
      if ( !is_array( $options ) )
          return false;
          
      foreach( $this->multiOptions[$model->alias] as $key => $value ) {
          if ( isset( $options[$key ] ) &&  is_bool( $options[ $key ] )  ) {
              $this->multiOptions[$model->alias][$key] = $options[ $key ];
          }    
      }
     
    
  }

  /**
  * afterFind Callback
  *
  * @param Model $model Model find was run on
  * @param array $results Array of model results.
  * @param boolean $primary Did the find originate on $model.
  * @return array Modified results
  */
  public function afterFind(Model $model, $results, $primary) {
    //$model->virtualFields = $this->runtime[$model->alias]['virtualFields'];
  	$this->runtime[$model->alias]['virtualFields'] = $this->runtime[$model->alias]['fields'] = array();
  	$locale = $this->_getLocale($model);

  	if (empty($locale) || empty($results) || empty($this->runtime[$model->alias]['beforeFind'])) {
  		return $results;
  	}
      
  	$beforeFind = $this->runtime[$model->alias]['beforeFind'];
      
  	foreach ($results as $key => &$row) {
  		$results[$key][$model->alias]['locale'] = (is_array($locale)) ? current($locale) : $locale;
  		foreach ($beforeFind as $_f => $field) {
  			$aliasField = is_numeric($_f) ? $field : $_f;
  			if (is_array($locale)) {
  				foreach ($locale as $_locale) {
  				   if ( $this->multiOptions[$model->alias]['find']) {
                if(!is_array($row[$model->alias][$aliasField])){
                  $row[$model->alias][$aliasField] = array();
                };
                if (!isset($row[$model->alias][$aliasField][$_locale]) && !empty($row['I18n__' . $field . '__' . $_locale]['content'])) {
  						     $row[$model->alias][$aliasField][$_locale] = $row['I18n__' . $field . '__' . $_locale]['content'];
  						     $row[$model->alias]['locale'] = $_locale;
  					   }

             } else {
  					  if (!isset($row[$model->alias][$aliasField]) && !empty($row['I18n__' . $field . '__' . $_locale]['content'])) {
    							$row[$model->alias][$aliasField] = $row['I18n__' . $field . '__' . $_locale]['content'];
         					$row[$model->alias]['locale'] = $_locale;
            	 }
             }    
  					 unset($row['I18n__' . $field . '__' . $_locale]);
    
  				}

  				if (!isset($row[$model->alias][$aliasField])) {
  					$row[$model->alias][$aliasField] = '';
  				}
  			} else {
  				$value = '';
  				if (!empty($row['I18n__' . $field])) {
  					$value = $row['I18n__' . $field]['content'];
  				}
  				$row[$model->alias][$aliasField] = $value;
  				unset($row['I18n__' . $field]);
  			}
  		}
  	}
  	return $results;
  }

  /**
  * beforeValidate Callback
  *
  * @param Model $model Model invalidFields was called on.
  * @return boolean
  */
  public function beforeValidate(Model $model) {
  	$locale = $this->_getLocale($model);
  	if (empty($locale)) {
  		return true;
  	}
      
        if ( $this->multiOptions[$model->alias]['validate'] ) {
            $valid = $this->_multiValidate($model);
            if ( !$valid )
                return false;
          
        }
      
  	$fields = array_merge($this->settings[$model->alias], $this->runtime[$model->alias]['fields']);
  	$tempData = array();

  	foreach ($fields as $key => $value) {
  		$field = (is_numeric($key)) ? $value : $key;

  		if (isset($model->data[$model->alias][$field])) {
  			$tempData[$field] = $model->data[$model->alias][$field];
  			if (is_array($model->data[$model->alias][$field])) {
  				if (is_string($locale) && !empty($model->data[$model->alias][$field][$locale])) {
  					$model->data[$model->alias][$field] = $model->data[$model->alias][$field][$locale];
  				} else {
  					$values = array_values($model->data[$model->alias][$field]);
  					$model->data[$model->alias][$field] = $values[0];
  				}
  			}
  		}
  	}
  	$this->runtime[$model->alias]['beforeSave'] = $tempData;
  	return true;
  }


  /**
  * Set locale's for model
  *
  * @param string|array $local  set locale's' for model.
  * @return mixed string or false
  */

    public function setLocale(Model $model,$locale = null) {
        if ( !$locale ) {
            $locale = Configure::read('Config.language'); 
        }
        if (!class_exists('I18n')) {
				  App::import('Core', 'i18n');
			  }
        $I18n = I18n::getInstance();
        if ( is_array( $locale ) ){
            foreach($locale as $key =>  $_locale){
                 $I18n->l10n->get($_locale);
              $locale[$key] = $I18n->l10n->locale;
            }
            return $model->locale = $locale;

        } else {
            $I18n->l10n->get($locale);
            return $model->locale = $I18n->l10n->locale;
        }
      
    }




  /**
  * beforeValidate Callback
  *
  * In here we validate all translated field by it self to make sure we have valid input everywhere
  *
  * @param Model $model Model invalidFields was called on.
  * @return boolean
  */
  public function _multiValidate(&$model) {
  	$cModel = clone $model;
  	$valid = true;
  	$errorWhileValidation = false;
      $fields = array_merge($this->settings[$model->alias], $this->runtime[$model->alias]['fields']);
  	if(isset($model->data[$model->alias])){
  		$data = $model->data[$model->alias];

  		foreach($fields as $field){

  			if(isset($data[$field])){
  				$values = $data[$field];
  				foreach($values as $locale => $value){
  					$cModel->data = array($field => $value);
  					$valid = $cModel->validates(
  						array(
  							'fieldList' => array($field)
  						)
  					);
  					if(!$valid){
  						$model->validationErrors[$field][$locale] = $cModel->validationErrors[$field];
  						unset($cModel->validationErrors[$field]);
  						$errorWhileValidation = ($errorWhileValidation === false ? true : false);
  					}
  				}
  			}
  		}
  	}

  	$valid = !$errorWhileValidation;
  	return $valid;
  }
}
?>
