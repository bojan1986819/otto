<?php

namespace App\Http\Controllers;

use App\About;
use App\Award;
use App\Cast;
use App\Classes\phpgrid\jqgrid;
use App\Classes\Slim;
use App\Press;
use App\Project;
use App\Quote;
use App\Repositories\SlimImageHandlingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class SiteController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getWelcome(){
        $quotes = Quote::get();
        return view('welcome',compact('quotes'));
    }

    public function getAboutMe(){
        $aboutme = About::first();

        return view('aboutme', array('aboutme' => $aboutme));
    }

    public function getProjects(){
        $projects = Project::get();
        $casts = Cast::get();
        $awards = Award::get();
        return view('projects', ['projects' => $projects, 'casts' => $casts, 'awards'=>$awards]);
    }

    public function getContactme(){
        return view('contactme');
    }

    public function getPress(){
        $presses = Press::paginate(6);
        return view('press',['presses'=>$presses]);
    }

    public function getAdminAboutMe(){
        $aboutme = About::first();

        $g = new jqgrid();
        $grid["caption"] = "Idézetek";
        $grid["shrinkToFit"] = true;
        $grid["resizable"] = true;
        $g->set_options($grid);
        $g->table = "quotes";

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
        $col["title"] = "Kitől";
        $col["name"] = "author";
        $col["width"] = "70";
        $col["editable"] = true;
        $col["hidden"] = false;
        $cols[] = $col;

        $col = array();
        $col["title"] = "Idézet";
        $col["name"] = "quote";
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

        $out_quotes = $g->render("list");
        return view('admin.aboutme', compact('aboutme','out_quotes'));
    }

    public function postUpdateAboutme(){

        $this->validate($this->request, [
            'description' => 'required',
        ]);
        $description = $this->request->description;
        $profile = $this->request->profile;
        if(isset($profile)){
            $image = Slim::getImages('profile')[0];
        }elseif(isset($this->request->delete)){
            $image = null;
        }else{
            $image = 'keep';
        }

        $path = storage_path('profiles');
        $about= About::first();

        $about->aboutme = $description;
        $about->save();

        SlimImageHandlingRepository::handleImage($image,$about,$path,$profile);


        return redirect()->route('admin_aboutme');
    }

    public function getAdmin(){
        return redirect()->route('login');
    }

    public function postEmail() {
        $this->validate($this->request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'name' => 'min:3',
            'message' => 'min:1']);

            $data = array(
                'email' => $this->request->email,
                'name' => $this->request->name,
                'subject' => $this->request->subject,
                'bodyMessage' => $this->request->message,
            );
            Mail::send(['html'=>'email.email'], $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('otto.banovits@gmail.com')
                    ->getSwiftMessage()
                    ->getHeaders()
                    ->addTextHeader('Content-type: text/html', 'true');
                $message->subject($data['subject']);
            });

        Session::flash('success', 'Email sent');

        return redirect()->route('contact');
    }


}
