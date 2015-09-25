<?php

require_once '../Shareds/Constants.php';
require_once Constants::$DanhMuc_model_child_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DanhMuc_mng_ctrl
 *
 * @author HaThuy
 */
class DanhMuc_mng_ctrl {

    //put your code here
    function show_Menu($list_menu) {
        if (count($list_menu) > 0) {
            echo "<ul class='drop' > ";
            foreach ($list_menu as $mn) {
                echo "<li> <a href='".Constants::$trangchu."?conten=abc&sub=".$mn["IDDM"]."&sub1=".$mn['IDDMCha']."' >" . $mn["TenDM"] . " </a>";
                $mn_child = DanhMuc_mng_model::get_DanhMucCon($mn['IDDM'],$mn['IDNhomQuyen']);
                $this->show_Menu($mn_child);
                echo "</li>";
            }
            echo "</ul>";
        }
    }

}
