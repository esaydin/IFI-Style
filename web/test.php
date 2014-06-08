<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$v = "Abc";
if(preg_match("/[^a-zA-Z[ ]üÜöÖäÄß-]+$/", $v)){
    echo "true";
}else{
    echo "false";
}
?>