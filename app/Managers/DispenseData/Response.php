<?php

namespace App\Managers\DispenseData;

class Response
{
	protected $datas = [];
	protected $errors = [];

    public function __construct($datas)
    {
        $this->datas = $datas;

        if (isset($datas['errors'])) {
			$this->errors = $datas['errors'];
        }
    }

    public function success()
    {
    	return ! $this->errors;
    }

    public function getDatas()
    {
    	return $this->datas;
    }    

    public function getErrors()
    {
        return $this->errors;
    }        
}
