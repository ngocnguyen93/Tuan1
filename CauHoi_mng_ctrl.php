<?php
require_once '../Shareds/Constants.php';
require_once Constants::$CauHoi_model_child_url;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CauHoi_mng_ctrl
 *
 * @author Ngocnguyen
 */
class CauHoi_mng_ctrl {
    public function Insert_CauHoi() {
        $ten = $_REQUEST['txt_Name'];
        if (CauHoi_model::Insert_CauHoi($ten)) {
            Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Insert_success_msg );
        } else {
           Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Insert_fail_msg );
        }
    }
    public function Update_CH() {
        $id = $_REQUEST['id'];
        $ten = $_REQUEST['ten'];
        if (CauHoi_model::Update_CauHoi($id , $ten )) {
             Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Update_success_msg);
        } else {
              Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Update_fail_msg);
        }
    }
     public function Delete_CH() {
        $id = $_REQUEST['id'];
        if (CauHoi_model::Delete_CauHoi($id)) {
             Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Delete_success_msg);
        } else {
            Header( "Location:".Constants::$trangchu."?conten=abc&sub=5&tb=".Constants::$Delete_fail_msg .".Bạn phải xóa các phản hồi của câu hỏi này trong quản lí phản hồi trước");
        }
    }
    public function Search_CH() {
        $value= $_REQUEST['search_val'];
        $type = $_REQUEST['search_type'];        

        $rs_search = CauHoi_model::Search_CauHoi($value, $type);
        if ( $rs_search != NULL) {
            echo json_encode($rs_search);
        } 
    }
}
$action = @$_REQUEST["act"];
$cauhoi_mng_ctrl_obj = new CauHoi_mng_ctrl();
switch ($action) {
    case Constants::$insert_act:
    $cauhoi_mng_ctrl_obj->Insert_CauHoi();
        break;
    case Constants::$delete_act:

        $cauhoi_mng_ctrl_obj->Delete_CH();
        break;
     case Constants::$update_act:
$cauhoi_mng_ctrl_obj->Update_CH();
        break;
     case Constants::$search_act:
$cauhoi_mng_ctrl_obj->Search_CH();
        break;

    default:
        break;

}