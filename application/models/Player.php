<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Player
 *
 * @author a00906732
 */
class Player extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('players','cash');
    }
}
