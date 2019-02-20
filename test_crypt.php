<?php
/**
 * Created by PhpStorm.
 * User: glyde
 * Date: 2/17/2019
 * Time: 12:23 PM
 */

require __DIR__."/mega/lib/mega.class.php";


$mega_obj = new MEGA();

$mega_client = $mega_obj->create_from_login("mark@webwarephpdevelopment.com", "Rush2112!");

