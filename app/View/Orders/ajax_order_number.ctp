<?php 

/**
 * ajax_order_number view
 * LAYOUT: ajax
 *
 * PHP v5
 *
 * @author     	Michael Haynes <kb1ibh@gmail.com>
 * @copyright  	2014 Boston BioProducts Inc.
 * @license    	MIT License
 * @created		2014-10-01
 * @modified	2014-10-01
 */

echo json_encode(array('duplicate' => (bool)$resultCount));
?>