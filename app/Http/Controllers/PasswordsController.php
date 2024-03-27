<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{
    private string $lowerCase = "abcdefghijklmnopqrstuvxyz";
    private string $upperCase = "ABCDEFGHIJKLMNOPQRSTUVXYZ";
    private string $numbers = "0123456789";
    private string $specialChar = "!#$%&'()*+,-./:;<=>?@[\]^_`{|}";

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $concatValue = "";
        $passLength = 0;
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
                $passLength = $request->input('length');
            }
            $randomPassword = substr(str_shuffle($concatValue), 0, $passLength);
            return view('newpass', compact("randomPassword"));
        }
        return redirect(route('generator'));
    }
}
