<?php
/**
 * Created by IntelliJ IDEA.
 * User: bojan
 * Date: 2017. 04. 18.
 * Time: 16:41
 */

namespace App\Repositories;


use App\About;
use App\Classes\Slim;
use App\Project;
use App\User;


class SlimImageHandlingRepository
{
    public static function handleImage($image,About $user,$path,$profile){
        $result = ['input'=>null, 'output'=>null];
        if ( $profile )
        {
            if ( isset($image['input']['data']) )
            {
                $cropMeta = implode(',', $image['actions']['crop']);
                $rotationMeta = $image['actions']['rotation'];
                $result['input']=Slim::saveFile($image['input']['data'], $user->id . '.jpg', $path);
                $user->setMeta('profilecrop',$cropMeta);
                $user->setMeta('profilerotation',$rotationMeta);
                $user->setMeta('profile',$result['input']['name']);
                $user->save();
                if(isset($image['output']['data'])){
                    $result['output']=Slim::saveFile($image['output']['data'], $user->id . '-cropped.jpg', $path);
                    $user->setMeta('profileoutput',$result['output']['name']);
                }

            }
        }
        else{
            //check if profile is set or image is set to delete
            if($user->profile != null && $image != 'keep'){
                unlink($path.'/'.$user->profile);
                unlink($path.'/'.$user->profileoutput);
                $user->dropMeta('profilecrop');
                $user->dropMeta('profilerotation');
                $user->dropMeta('profileoutput');
                $user->dropMeta('profile');
                $user->save();
            }
        }
        return $result;
    }

    public static function handlePoster($image,Project $project,$path){
        $result = ['input'=>null, 'output'=>null];
        if ( isset($image['input']['data']) )
        {
            $cropMeta = implode(',', $image['actions']['crop']);
            $rotationMeta = $image['actions']['rotation'];
            $result['input']=Slim::saveFile($image['input']['data'], $image['input']['name'] . '-original.jpg', $path, false);
            $project->setMeta('postercrop',$cropMeta);
            $project->setMeta('posterrotation',$rotationMeta);
            $project->setMeta('posteroriginal',$result['input']['name']);
            $project->save();
            if(isset($image['output']['data'])){
                $result['output']=Slim::saveFile($image['output']['data'], $image['input']['name'], $path, false);
                $project->setMeta('profileoutput',$result['output']['name']);
            }
        }
        return $result;
    }


}