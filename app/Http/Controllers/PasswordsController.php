<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{
   public  $lowerCase = "abcdefghijklmnopqrstuvxyz";
   public  $upperCase  =  "ABCDEFGHIJKLMNOPQRSTUVXYZ";
   public  $numbers = "0123456789";
   public  $specialChar = "!#$%&'()*+,-./:;<=>?@[\]^_`{|}";

    public function generate(Request $request)
    {
        $concatValue = "";
        $passLentgh = 0;

        if (!empty($request->input())) {    

            if (!empty($request->input('passArr'))) {

                $arrayOfRequirements = $request->input('passArr');

                foreach ($arrayOfRequirements as $value) {

                    if ($value == 1) {
                        $concatValue .= $this->specialChar;
                    } elseif ($value == 2) {
                        $concatValue .= $this->numbers;
                    } elseif ($value == 3) {
                        $concatValue .= $this->lowerCase;
                    } elseif ($value == 4) {
                        $concatValue .= $this->upperCase;

                    }
                }

            }

            if (!empty($request->input('length'))) {

                $passLentgh = $request->input('length');
            }

            $randomPassword = "";

            $randomPassword = substr(str_shuffle($concatValue), 0, $passLentgh);

            return view('newpass', compact("randomPassword"));
        }

    }
}
