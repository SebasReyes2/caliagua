<?php

class TipoValidation extends CValidator{
    public function validateAttribute($object, $attribute) {
        if(!$object->$attribute){
            return $this->addError($object, $attribute, "Este campo es necesario.");
        }
    }
}

