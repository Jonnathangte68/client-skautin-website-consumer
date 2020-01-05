<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $errors = array();
        error_log("called change password");
        $tokenReal = $request->session()->get('change_token');
        // error_log("token real: " . $tokenReal);
        $token = $request->input('token');
        // error_log("token: " . $token);
        $newPassword = $request->input('password');
        $user = $request->session()->get('user');
        if($token && ($tokenReal===$token)) {
            if(!preg_match(
                "/^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/", 
                $newPassword)) 
            {
                array_push($errors, 'Weak password');
                return json_encode(array('status' => false, 'message' => 'Weak password', 'errors' => $errors));
            } elseif($newPassword === "cb45!@Ka" || $newPassword === "ab45!@Ka" || $newPassword === '') {
                array_push($errors, 'Please enter another password');
                return json_encode(array('status' => false, 'message' => 'Please enter another password', 'errors' => $errors));
            } else {
                $path = "../app/login_data.txt";
                file_put_contents($path, "");
                error_log("path: " . $path);
                $file = fopen($path, "w");
                fwrite($file, $user.PHP_EOL);
                fwrite($file, $newPassword.PHP_EOL);
                fclose($file);
            }
            
        } else {
            array_push($errors, 'Unexpected error!');
            return json_encode(array('status' => false, 'message' => 'Unexpected error!', 'errors' => $errors));
        }
        $uuid1 = Uuid::uuid1();
        $request->session()->put('secret-login', $uuid1->toString());
        $request->session()->put('user', $user);
        $request->session()->forget('change_token');
        return json_encode(array('status' => true, 'message' => 'Password succesfully changed.'));
    }
}
