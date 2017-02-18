<?php

namespace LaravelSocial\Http\Controllers;

use Illuminate\Http\Request;
use LaravelSocial\User;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    public function user_avatar($id, $size) {

        $user = User::findOrFail($id);
        $placeholder_path = storage_path('app\public\users\placeholder.png');

        if(is_null($user->avatar)){
            $image = Image::make($placeholder_path)->fit($size)->response('png', 90);
        } elseif(strpos($user->avatar, 'http') !== false){
            $image = Image::make($user->avatar)->fit($size)->response('png', 90);
        }else{
            $avatar_path = asset('storage/users/' . $id . '/avatars/' . $user->avatar);
            $image = Image::make($avatar_path)->fit($size)->response('png', 90);
        }


        return $image;
    }
}
