<?php
/**
 * Created by PhpStorm.
 * Admin: WMT_PS
 * Date: 8/10/2017
 * Time: 5:50 PM
 */

namespace App\Utils;


use Illuminate\Support\Facades\Log;

class Helper
{
    public static function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }

    public static function validIdentification($number)
    {

        if (strlen($number) !== 9) {
            return false;
        }
        $newNumber = strtoupper($number);
        $icArray = [];
        for ($i = 0; $i < 9; $i++) {
            $icArray[$i] = $newNumber{$i};
        }
        $icArray[1] = intval($icArray[1], 10) * 2;
        $icArray[2] = intval($icArray[2], 10) * 7;
        $icArray[3] = intval($icArray[3], 10) * 6;
        $icArray[4] = intval($icArray[4], 10) * 5;
        $icArray[5] = intval($icArray[5], 10) * 4;
        $icArray[6] = intval($icArray[6], 10) * 3;
        $icArray[7] = intval($icArray[7], 10) * 2;

        $weight = 0;
        for ($i = 1; $i < 8; $i++) {
            $weight += $icArray[$i];
        }
        $offset = ($icArray[0] === "T" || $icArray[0] == "G") ? 4 : 0;
        $temp = ($offset + $weight) % 11;

        $st = ["J", "Z", "I", "H", "G", "F", "E", "D", "C", "B", "A"];
        $fg = ["X", "W", "U", "T", "R", "Q", "P", "N", "M", "L", "K"];

        $theAlpha = "";
        if ($icArray[0] == "S" || $icArray[0] == "T") {
            $theAlpha = $st[$temp];
        } else if ($icArray[0] == "F" || $icArray[0] == "G") {
            $theAlpha = $fg[$temp];
        }
        return ($icArray[8] === $theAlpha);
    }

    public static function sendOTP($sms_to, $sms_msg)
    {
        $query_string = "api.aspx?apiusername=" . AppConstant::API_USERNAME . "&apipassword=" . AppConstant::API_PASSWORD;
        $query_string .= "&senderid=" . rawurlencode(AppConstant::SMS_FROM) . "&mobileno=" . rawurlencode($sms_to);
        $query_string .= "&message=" . rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";
        $url = AppConstant::MT_URL . $query_string;
        $fd = @implode('', file($url));
        if ($fd) {
            if ($fd > 0) {
                Print("MT ID : " . $fd);
                $ok = "success";
            } else {
                print("Please refer to API on Error : " . $fd);
                $ok = "fail";
            }
        } else {
            // no contact with gateway
            $ok = "fail";
        }
        return $ok;
    }

    public static function generateOTP($length)
    {
        $token = "";
        $codeAlphabet = "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
        return $token;
    }
}