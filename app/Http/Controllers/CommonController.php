<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class CommonController extends Controller
{
    #response parameter keys.
    public static $WEB_CODE = "code";
    public static $WEB_DATA = "data";
    public static $WEB_MESSAGE = "message";

    #response parameter values.
    public static $CODE_SUCCESS = "success";
    public static $CODE_FAILED = "failed";
    public static $CODE_ERROR = "error";
    

    /**
     * @name    sendResponse
     * @desc    This function will be used accross the website to send any type (SUCCESS / FAILED / ERROR) response.
     * @params  
     *      $code    = "success",
     *      $data    = [],
     *      $message = ""
     * @success
     *      [
     *          "code"      =>  "success",
     *          "data"      =>  [],
     *          "message"   =>  ""
     *      ]
     * @failed
     *      [
     *          "code"      =>  "failed",
     *          "message"   =>  ""
     *      ]
     */
    public function sendResponse ($code = "failed", $data = [], $message = "") {
        $response = [];
        
        try {
            if(!empty($code)) {
                switch ($code) {
                    case "success":
                        $response = [
                            self::$WEB_CODE     =>  self::$CODE_SUCCESS,
                            self::$WEB_DATA     =>  !empty($data) ? $data : [],
                            self::$WEB_MESSAGE  =>  !empty($message) ? $message : ""
                        ];
                        break;

                    case "failed":
                        $response = [
                            self::$WEB_CODE     =>  self::$CODE_FAILED,
                            self::$WEB_MESSAGE  =>  !empty($message) ? $message : ""
                        ];
                        break;
                }
            }
        } catch (Exception $ex) {
            $response = [
                self::$WEB_CODE     =>  self::$CODE_ERROR,
                self::$WEB_MESSAGE  =>  !empty($ex->getMessage()) ? $ex->getMessage() : ""
            ];
        }

        return $response;
    }

    
    /**
     * @name    sendException
     * @desc    This function will be used across the website to send any exception response.
     * @params  $message = ""
     * @success
     *      [
     *          "code"      =>  "error",
     *          "message"   =>  ""
     *      ]
     * @failed
     *      [
     *          "code"      =>  "failed",
     *          "message"   =>  ""
     *      ]
     */
    public function sendException ($message = "") {
        $response = [];
        
        try {
            $response = [
                self::$WEB_CODE     =>  self::$CODE_ERROR,
                self::$WEB_MESSAGE  =>  !empty($message) ? $message : "Oops something went wrong!!!"
            ];
        } catch (Exception $ex) {
            $response = [
                self::$WEB_CODE     =>  self::$CODE_ERROR,
                self::$WEB_MESSAGE  =>  !empty($ex->getMessage()) ? $ex->getMessage() : ""
            ];
        }

        return $response;
    }


    /**
     * @name    getDirectories
     * @desc    This function will be used across the website to fetch the file directories for various pages.
     * @params  
     *      $page    = "home_page"
     * @success
     *      [
     *          "files"      =>  []
     *      ]
     * @failed  false
     */
    public function getDirectories ($page = "") {
        $directories = [];
        
        try {
            if(!empty($page)) {
                $directories = Storage::directories($page);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }

        return $directories;
    }

    
    /**
     * @name    getFiles
     * @desc    This function will be used across the website to fetch the files for various pages.
     * @params  
     *      $page    = "home_page",
     *      $section = "about"
     * @success
     *      [
     *          "files"      =>  []
     *      ]
     * @failed  false
     */
    public function getFiles ($page = "", $section = "") {
        $files = [];
        
        try {
            if(!empty($page) && !empty($section)) {
                $file_dir = (!empty($page) ? $page . (!empty($section) ? "/" . $section : "") : "");
                $files = Storage::files($file_dir);
            }
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }

        return $files;
    }
}
