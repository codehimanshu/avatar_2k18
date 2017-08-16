<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Session;
use SammyK;
use DB;
use Image;
use Response;
use Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
    {
        if(Session::get('user')&&Session::get('fb_user_access_token'))
        {
            $is_login = true;

            $fb->setDefaultAccessToken(Session::get('fb_user_access_token')); 
            $user = Session::get('user');
            $user_id = $user['id'];

            try {
                $response = $fb->get('/me?fields=picture.width(800).height(800)');
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                dd($e->getMessage());
            }

            $profile_pic = $response->getGraphObject();
            $profile_pic = $profile_pic['picture']['url'];

            DB::table('users')->where('id',$user_id)->update(['profile_pic'=>$profile_pic]);

            $img = Image::make($profile_pic);
            $img->resize(800, 800);
            $frame = Image::make(public_path().'/frame.png');
            $frame->resize(800, 800);
            $img->insert($frame);
            $img->encode('png');
            $type = 'png';
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);

            return view('home',compact('is_login','base64'));   
        }
        else
            return redirect('/');
    }

    public function post(Request $request,SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
    {
        if(Session::get('user')&&Session::get('fb_user_access_token'))
        {
            $is_login = true;
            $fb->setDefaultAccessToken(Session::get('fb_user_access_token')); 
            $user = Session::get('user');
            $user_id = $user['id'];

            $base64 = $request->image;
            $pos = strpos($base64,'base64,');
            $base64 = substr($base64, $pos+7);
            $data = base64_decode($base64);
            // $data = explode(',', $base64);
            $img = imagecreatefromstring ( $data );
            imagejpeg($img,$user_id.'.jpeg');
            $data = [
                'message'=>'',
                'source'=>$fb->fileToUpload(public_path().'/'.$user_id.'.jpeg')
            ];


            try {
              // Returns a `Facebook\FacebookResponse` object
              $response = $fb->post('/me/photos', $data);
            } catch(Facebook\Exceptions\FacebookResponseException $e) {
              echo 'Graph returned an error: ' . $e->getMessage();
              exit;
            } catch(Facebook\Exceptions\FacebookSDKException $e) {
              echo 'Facebook SDK returned an error: ' . $e->getMessage();
              exit;
            }

            $graphNode = $response->getGraphNode();
            $photo_id = $graphNode->getProperty('id');

            return redirect('https://www.facebook.com/photo.php?fbid='.$photo_id);
        }
        else
            return redirect('/');

    }
}
