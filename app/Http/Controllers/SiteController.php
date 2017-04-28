<?php

namespace App\Http\Controllers;

use App\About;
use App\Cast;
use App\Classes\Slim;
use App\Press;
use App\Project;
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

    public function getAboutMe(){
        $aboutme = About::first();
        return view('aboutme', array('aboutme' => $aboutme));
    }

    public function getProjects(){
        $projects = Project::get();
        $casts = Cast::get();
        return view('projects', ['projects' => $projects, 'casts' => $casts]);
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
        return view('admin.aboutme', array('aboutme' => $aboutme));
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
