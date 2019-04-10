<?php

class MessageController{

    public function errorAlert($msg){
        $string  = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Holy guacamole!</strong> ".$msg."
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
        return $string;
    }
    public function successAlert($msg){
        $string  = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Success!</strong> ".$msg."
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>";
        return $string;
    }
}


?>