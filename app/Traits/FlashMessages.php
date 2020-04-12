<?php

namespace App\Traits;

trait FlashMessages{
    protected $errorMessages = [];
    protected $infoMessages = [];
    protected $successMessages = [];
    protected $warningMessages = [];

    // setter method called setFlashMessage
    protected function setFlashMessage($messages, $type){
        $Model = 'infoMessages';

        switch($type){
            case 'info':{
                $model = 'infoMessages';
            }
            break;

            case 'error': {
                $model = 'errorMessages';
            }
            break;

            case 'success': {
                $model = 'successMessages';
            }
            break;

            case 'warning': {
                $model = 'warningMessages';
            }
            break;
        }

        if(is_array($messages)){
            foreach($messages as $key => $value){
                array_push($this->$model, $value);
            }
        }else{
            array_push($this->$model, $messages);
        }
    }

    // getter method
    protected function getFlashMessage(){
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
            'success' => $this->successMessages,
            'warning' => $this->warningMessages,
        ];
    }

    protected function showFlashMessages(){
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->successMessages);
        session()->flash('warning', $this->warningMessages);
    }
}