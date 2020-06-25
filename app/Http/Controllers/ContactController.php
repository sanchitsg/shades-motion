<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exception;

class ContactController extends CommonController
{

    /**
     * @name    postContacts
     * @desc    This function will be used to create a new Client Contacts entry.
     * @inputs  [
     *              client-name,
     *              company-name,
     *              client-email,
     *              client-number
     *          ]
     * @success [
     *              "code"  =>  "success",
     *              "data"  =>  [
     *                  "client_name"
     *                  "company_name"
     *              ],
     *              "message"   =>  "Client details have been mailed to Shades & Motion Team."
     *          ]
     * @failed  [
     *              "code"  =>  "failed",
     *              "message"   =>  "Client details could not be processed!"
     *          ]
     */
    public function postContacts () {
        $response = [];

        try {
            $inputs = Input::all();
            if(!empty($inputs['client-name']) && (!empty($inputs['client-email']) || !empty($inputs['client-number']))) {
                //send email.
                $response = [
                    "code"      =>  "success",
                    "data"      =>  [],
                    "message"   =>  "Client details have been mailed to Shades & Motion Team."
                ];
            } else {
                $response = [
                    "code"      =>  "failed",
                    "message"   =>  "Client details could not be mailed!."
                ];
            }
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