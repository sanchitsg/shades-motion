<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class WorkController extends CommonController
{

    public static $WORK_BASE_DIR = "work_page";
    
    /**
     * @name    getWorkPage
     * @desc    This function will be used to load the data for the WORK page.
     * @params  []
     * @success view('content.work')
     * @failed  view('content.error')
     */
    public function getWorkPage (Request $request) {
        try {
            $type = !empty(explode("work/",$request->path())[1]) ? explode("work/",$request->path())[1] : "animations-2d";
            $name = ($type == "animations-2d" ? "2D ANIMATIONS" : ($type == "animations-3d" ? "3D ANIMATIONS" : "FILMS"));
            $work = [];
            
            $image_count = 0;
            $image_start = 0;
            $image_end = 7;

            $directories = self::getDirectories(self::$WORK_BASE_DIR . "/" . $type);

            if(!empty($directories)) {
                foreach($directories as $dir) {
                    if($image_count >= $image_start && $image_count < $image_end) {
                        $dir_arr = explode(self::$WORK_BASE_DIR . "/" . $type . "/", $dir);
                        if(!empty($dir_arr[1])) {
                            $sub_dir = array_get($dir_arr,1,'');
                            $work[$sub_dir] = self::getFiles(self::$WORK_BASE_DIR . "/" . $type . "/", $sub_dir);
                        }
                    }
                    $image_count++;
                }
            }

            return view('content.work',compact('name','work'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return view('content.error');
        }
    }


    /**
     * @name    getWorkPageAjax
     * @desc    This function will be used to load the data for the WORK page in response to AJAX requests.
     * @params  []
     * @success view('content.work-ajax')
     * @failed  view('content.error')
     */
    public function getWorkPageAjax (Request $request) {
        try {
            $inputs = Input::all();
            $response = $work = [];

            if(!empty($inputs['start']) && !empty($inputs['type'])) {
                $image_count = 0;
                $image_start = array_get($inputs,'start',0);
                $image_end = $image_start + 7;

                $type = !empty(explode("work/",$request->path())[1]) ? explode("work/",$request->path())[1] : "animations-2d";
                $directories = self::getDirectories(self::$WORK_BASE_DIR . "/" . $type);

                if(!empty($directories)) {
                    foreach($directories as $dir) {
                        if($image_count >= $image_start && $image_count < $image_end) {
                            $dir_arr = explode(self::$WORK_BASE_DIR . "/" . $type . "/", $dir);
                            if(!empty($dir_arr[1])) {
                                $sub_dir = array_get($dir_arr,1,'');
                                $work[$sub_dir] = self::getFiles(self::$WORK_BASE_DIR . "/" . $type . "/", $sub_dir);
                            }
                        }
                        $image_count++;
                    }
                }
            }

            if(!empty($work)) {
                $response = $this->sendResponse("success",view('content.components.work-ajax',compact('work'))->render(),"More work data has been returned.");
            } else {
                $response = $this->sendResponse("failed",[],"No more work data available!");
            }

            return $response;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return view('content.error');
        }
    }
}
