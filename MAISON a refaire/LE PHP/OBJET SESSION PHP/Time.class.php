<?php

class Time {

	private $seconds;
    private $minutes;
    private $hours;

    public function __construct($hours, $minutes, $seconds)
    {
       $this->seconds = $seconds;
       $this->minutes = $minutes;
       $this->hours = $hours;
    }


	public function addSecond()
    {
        if($this->seconds < 59){
        	$this->seconds ++;
        }else {
        	$this->seconds = 0;
        	if($this->minutes < 59){
        		$this->minutes++;
        	} else {
        		$this->minutes = 0;
        		if($this->hours < 23){
        			$this->hours++;
        		} else {
        			$this->hours = 0;
        		}
        	}
        }
    }



    public function addMinute()
    {

        if($this->minutes < 59){
        	$this->minutes++;
        } else {
        	$this->minutes = 0;
        	if($this->hours < 23){
        		$this->hours++;
        	} else {
        		$this->hours = 0;
        	}
        }

    }


    public function addHour()
    {

        if($this->hours < 23){
        	$this->hours++;
        } else {
        	$this->hours = 0;
        }

    }


    public function display() {
    	echo '<p>'.$this->hours.' : '.$this->minutes.' : '.$this->seconds.'</p>';

    }


}


?>
