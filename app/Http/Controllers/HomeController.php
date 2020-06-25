<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class HomeController extends CommonController
{
    public static $HOME_BASE_DIR = "home_page";

    /**
     * @name    getHomePage
     * @desc    This function will be used to load the data for the HOME page.
     * @params
     * @success view('content.home')
     * @failed  view('content.error')
     */
    public function getHomePage () {
        try {
            $inputs = Input::all();
            
            $files = $about = $clients = [];

            $directories = self::getDirectories(self::$HOME_BASE_DIR);

            if(!empty($directories)) {
                $sections = [];
                foreach($directories as $dir) {
                    $dir_arr = explode(self::$HOME_BASE_DIR . "/", $dir);
                    if(!empty($dir_arr[1])) {
                        $sub_dir = array_get($dir_arr,1,'');
                        $files[$sub_dir] = self::getFiles(self::$HOME_BASE_DIR, $sub_dir);
                    }
                }
            }

            if(!empty($files['clients'])) {
                $carousel_count = 0;
                foreach($files['clients'] as $file_key => $file_val) {
                    if($file_key != 0 && $file_key % 4 == 0) {
                        $carousel_count++;
                    }
                    $file_arr = explode("home_page/clients/", $file_val);
                    $file_arr = explode(".", !empty($file_arr[1]) ? $file_arr[1] : '');
                    $clients[$carousel_count][] = [
                        'name'  =>  !empty($file_arr[0]) ? strtoupper($file_arr[0]) : '',
                        'path'  =>  $file_val
                    ];
                }
            }

            if(!empty($files['about'])) {
                foreach($files['about'] as $file_key => $file_val) {
                    if(preg_match("/about-bg/i", $file_val) == 1) {
                        $about['img'] = $file_val;
                    } elseif(preg_match("/about-parallax/i", $file_val) == 1) {
                        $file_arr = explode("home_page/about/", $file_val);
                        $file_arr = explode(".", !empty($file_arr[1]) ? $file_arr[1] : '');
                        $about['parallax'][] = $file_val;
                    } else {
                        $file_arr = explode("home_page/about/", $file_val);
                        $file_arr = explode(".", !empty($file_arr[1]) ? $file_arr[1] : '');
                        $about['cards'][] = [
                            'name'  =>  !empty($file_arr[0]) ? str_replace("-"," ", strtoupper($file_arr[0])) : '',
                            'path'  =>  $file_val
                        ];
                    }
                }
            }

            unset($files['clients']);
            unset($files['about']);
            
            $navigation_id = "home_id";
            return view('content.home',compact('navigation_id','files','about','clients'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return view('content.error');
        }
    }
}
