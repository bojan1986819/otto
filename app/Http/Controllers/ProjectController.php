<?php

namespace App\Http\Controllers;

use App\Classes\phpgrid\jqgrid;
use App\Classes\Slim;
use App\Project;
use App\Repositories\SlimImageHandlingRepository;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function phpgridManageProjects(){

        //projectek
        $g = new jqgrid();
        $grid["caption"] = "Projectek";
        $grid["detail_grid_id"] = "list2";
        $grid["shrinkToFit"] = true;
        $grid["resizable"] = true;
        $g->set_options($grid);
        $g->table = "projects";

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
        $col["title"] = "Cég";
        $col["name"] = "company";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Video";
        $col["name"] = "video";
        $col["width"] = "70";
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Video feltöltése";
        $col["name"] = "video";
        $col["width"] = "50";
        $col["editable"] = true;
        $col["edittype"] = "file"; // render as file
        $col["upload_dir"] = "videos"; // upload here
        $col["editrules"] = array("ifexist"=>"overwrite");
        $col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
        $cols[] = $col;

        $col = array();
        $col["title"] = "Előkép";
        $col["name"] = "poster";
        $col["width"] = "70";
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Előkép feltöltése";
        $col["name"] = "poster";
        $col["width"] = "50";
        $col["editable"] = true;
        $col["edittype"] = "file"; // render as file
        $col["upload_dir"] = "videos/posters"; // upload here
        $col["editrules"] = array("ifexist"=>"overwrite");
        $col["show"] = array("list"=>false,"edit"=>true,"add"=>true); // only show in add/edit dialog
        $cols[] = $col;

        $col = array();
        $col["title"] = "Kép<br>szerkesztése";
        $col["name"] = "logo";
        $col["width"] = "100";
        $col["align"] = "left";
        $col["search"] = false;
        $col["sortable"] = false;
        $col["export"] = true;
        $buttons_html = "<a href='../picture/{id}' data-toggle='lightbox' data-title='Kép szerkesztése'>Kép szerkesztése</a>";
        $col["default"] = $buttons_html;
        $cols[] = $col;

        $g->set_columns($cols);

        $e["on_insert"] = array(function($data){
            $nowdate = date('y/m/d');
            $data["params"]["created_at"] = $nowdate;
        }, null, true);
        $e["on_update"] = array(function($data){
            $nowdate = date('y/m/d');
            $data["params"]["updated_at"] = $nowdate;
        }, null, true);
        $e["on_delete"] = array(function($data){
            $rowid = $data["id"];
            $query = Project::select('video')->where('id','=',$rowid)->first();
            $query2 = Project::select('poster')->where('id','=',$rowid)->first();
            $obj = json_decode($query);
            $obj2 = json_decode($query2);
            $video = $obj->{'video'};
            $poster = $obj2->{'poster'};
            unlink(public_path().'/'.$video);
            unlink(public_path().'/'.$poster);
        }, null, true);
        $g->set_events($e);

        $out_projects = $g->render("list");

        // cast

        $g2 = new jqgrid();
        $opt["caption"] = "Cast és crew";
        $opt["datatype"] = "local"; // stop loading detail grid at start
        $opt["shrinkToFit"] = true;
        $opt["resizable"] = true;
        $g2->set_options($opt);
        $id = intval($_GET["rowid"]);

        $g2->select_command = "SELECT * FROM casts WHERE project_id = $id";
        $g2->table = "casts";

        $coe = array();
        $coe["title"] = "Id";
        $coe["name"] = "id";
        $coe["hidden"] = true;
        $coes[] = $coe;

        $coe = array();
        $coe["title"] = "Action";
        $coe["name"] = "act";
        $coe["width"] = "70";
        $coe["hidden"] = true;
        $coes[] = $coe;

        $coe = array();
        $coe["title"] = "Név";
        $coe["name"] = "name";
        $coe["hidden"] = false;
        $coe["editable"] = true;
        $coes[] = $coe;

        $coe = array();
        $coe["title"] = "Foglalkozás";
        $coe["name"] = "job";
        $coe["width"] = "70";
        $coe["hidden"] = false;
        $coe["editable"] = true;
        $coes[] = $coe;

        $g2->set_columns($coes);


        $f["on_insert"] = array(function($data){
            $id = intval($_GET["rowid"]);
            $nowdate = date('y/m/d');
            $data["params"]["project_id"] = $id;
            $data["params"]["created_at"] = $nowdate;
        }, null, true);
        $f["on_update"] = array(function($data){
            $nowdate = date('y/m/d');
            $data["params"]["updated_at"] = $nowdate;
        }, null, true);

        $g2->set_events($f);

        $out_cast = $g2->render("list2");

        return view('admin.projects', array('projects_output' => $out_projects, 'cast_output' => $out_cast));
    }

    public function getProjectPicture($project_id){
        $project = Project::find($project_id);

        return view('admin.modals.edit-project-picture',compact('project'));
    }

    public function postUpdateProjectPicture(){

        $profile = $this->request->profile;
        $project = Project::find($this->request->projectid);
        if(isset($profile)){
            $image = Slim::getImages('profile')[0];
        }elseif(isset($this->request->delete)){
            $image = null;
        }else{
            $image = 'keep';
        }

        $path = public_path().'/videos/posters/';

        SlimImageHandlingRepository::handlePoster($image,$project,$path);
        $project->poster = 'videos/posters/'.$image['input']['name'];
        $project->save();

        return redirect()->route('admin_projects');
    }
}
