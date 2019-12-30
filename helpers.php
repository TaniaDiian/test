<?php

function render_alert($class, $message){

    return '<div class="alert alert-'.$class .' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times</button>
                ' . $message .'</div>';

}