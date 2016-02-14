<?php

/**
 * Description of Stock
 *
 * @author a00906732
 */
class Stock extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('stocks','code');
    }
}
