<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class TeamController extends CommonController
{
    public static $TEAM_BASE_DIR = "team_page";

    /**
     * @name    getTeamPage
     * @desc    This function will be used to fetch the Teams Page.
     * @params
     * @success view('content.team')
     * @failed  view(content.error)
     */
    public function getTeamPage () {
        try {
            $lead = $others = [];
            $others_count = 0;
            
            $lead_dir = self::getDirectories(self::$TEAM_BASE_DIR . '/lead');
            if(!empty($lead_dir)) {
                foreach($lead_dir as $dir) {
                    $lead_name = $lead["lead_name"] = !empty(explode("team_page/lead/", $dir)[1]) ? explode("team_page/lead/", $dir)[1] : "";
                    $lead_files = self::getFiles(self::$TEAM_BASE_DIR,'lead/' . $lead_name);
                    foreach($lead_files as $files) {
                        if (preg_match("/\b.jpg\b/i", $files)) {
                            $lead["lead_img"] = $files;
                        } else if (preg_match("/\bdesignation.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $lead["lead_designation"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        } else if (preg_match("/\bintro.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $lead["lead_intro"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        } else if (preg_match("/\bquote.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $lead["lead_quote"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        }
                    }
                }
            }
            
            $other_dir = self::getDirectories(self::$TEAM_BASE_DIR . '/others');
            if(!empty($other_dir)) {
                foreach($other_dir as $dir) {
                    $other_name = $others[$others_count]["member_name"] = !empty(explode("team_page/others/", $dir)[1]) ? explode("team_page/others/", $dir)[1] : "";
                    $other_files = self::getFiles(self::$TEAM_BASE_DIR,'others/' . $other_name);
                    foreach($other_files as $files) {
                        if (preg_match("/\b.jpg\b/i", $files)) {
                            $others[$others_count]["member_img"] = $files;
                        } else if (preg_match("/\bdesignation.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $others[$others_count]["member_designation"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        } else if (preg_match("/\bintro.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $others[$others_count]["member_intro"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        } else if (preg_match("/\bquote.txt\b/i", $files)) {
                            $text_file = fopen("storage/" .$files, "r");
                            $others[$others_count]["member_quote"] = fread($text_file,filesize("storage/" .$files));
                            fclose($text_file);
                        }
                    }
                    $others_count++;
                }
            }

            $navigation_id = "team_id";

            return view('content.team',compact('navigation_id','lead','others'));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                "code"      =>  "error",
                "message"   =>  $ex->getMessage()
            ];
        }

        return $response;
    }

}