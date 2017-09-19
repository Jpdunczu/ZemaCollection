<?php


class validate {
    private $fields;
    
    public function _construct() {
        $this->fields = new Fields();
    }
    
    public function getFields() {
        return $this->fields;
    }
    
    public function text($name, $value,
            $required = true, $min = 1, $max = 225) {
        
        // Get Field object
        $field = $this->fields->getField($name);
        
        // If field is not required and empty, remove errors and exit
        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }
        
        // Check field and set or clear error message
        if($required && empty($value)) {
            $field->setErrorMessage('Required.');
        }else if(strlen($value) < $min){
            $field->setErrorMessage('Too short.');
        }else if(strlen($value) > $max) {
            $field->setErrorMessage('Too long.');
        }else {
            $field->clearErrorMessage();
        }
    }
    
    // Validate a field with a generic pattern
    public function pattern($name, $value, $pattern, $message,
            $required = true) {
        
        // Get Field object
        $field = $this->fields->getField($name);
        
        // If field is not required and empty, remove errors and exit
        if(!$required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }
        
        // Check field and set or clear error message
        $match = preg_match($pattern, $value);
        if( $match === false) {
            $field->setErrorMessage('Error testing field.');
        } else if($match != 1) {
            $field->setErrorMessage($message);
        }else {
            $field->clearErrorMessage();
        }
    }
    
    public function phone($name, $value, $required = false) {
        $field = $this->fields->getField($name);
        
        // Call the text method and exit if it yields an error
        $this->text($name, $value, $required);
        if($field->hasError()) { return; }
        
        // Call the pattern method to validate a phone number
        $pattern = '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
        $message = 'Invalid phone number.';
        $this->pattern($name,$value,$pattern,$message,$required);
    }
   /* 
    public function email($name,$value,$required = true) {
        $field = $this->fields->getField($name);
        
        if(!required && empty($value)) {
            $field->clearErrorMessage();
            return;
        }
        
        $this->text($name,$value,$required);
        if($field->hasError()) {return;}
        
        $parts = explode('@', $value);
        if(count($parts) < 2 ) {
            $field->setErrorMessage('At sign required.');
            return;
        }
        if(count($parts) < 2) {
            $field->setErrorMessage('Only one at sign allowed.');
            return;
        }
        $local = $parts[0];
        $domain = $parts[1];
    }
    */
    //put your code here
}
