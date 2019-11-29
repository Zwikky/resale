<?php

namespace App\Traits;

/**
 * Trait FlashMessages
 * @package App\Traits
 */
trait FlashMessages
{
    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @var array
     */
    protected $infoMessages = [];

    /**
     * @var array
     */
    protected $successMessages = [];

    /**
     * @var array
     */
    protected $warningMessages = [];

    /**
     * @param $message
     * @param $type
     */

    protected function setFlashMessage($message, $type){
        $model = 'infoMessages';

        switch ($type) {
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

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    /**
     * @return array
     */
    protected function getFlashMessage(){
        return [
            'error' => $this->errorMessage,
            'info' => $this->infoMessage,
            'success' => $this->successMessage,
            'warning' => $this->warningMessage,
        ];
    }
    
}
