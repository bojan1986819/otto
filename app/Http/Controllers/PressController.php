<?php

namespace App\Http\Controllers;

use App\Classes\phpgrid\jqgrid;
use Illuminate\Http\Request;

class PressController extends Controller
{
    public function phpgridManagePress(){

        $g = new jqgrid();
        $grid["caption"] = "Sajtó";
        $grid["shrinkToFit"] = true;
        $grid["resizable"] = true;
        $g->set_options($grid);
        $g->table = "presses";

        $col = array();
        $col["title"] = "Id";
        $col["name"] = "id";
        $col["hidden"] = true;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Action";
        $col["name"] = "act";
        $col["width"] = "70";
        $col["hidden"] = true;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Cím";
        $col["name"] = "title";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Leírás";
        $col["name"] = "description";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Médium neve";
        $col["name"] = "medium";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Link";
        $col["name"] = "link";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $e["on_insert"] = array(function($data){
            $nowdate = date('y/m/d');
            $data["params"]["created_at"] = $nowdate;
        }, null, true);
        $e["on_update"] = array(function($data){
            $nowdate = date('y/m/d');
            $data["params"]["updated_at"] = $nowdate;
        }, null, true);

        $g->set_events($e);


        $g->set_columns($cols);

        $out_press = $g->render("list");

        return view('admin.press', array('press_output' => $out_press));
    }

}
