<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('back.auth.login');
    }

    public function login_post(Request $request)
    {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'E-posta gereklidir',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin',
            'email.exists' => 'Böyle bir e-posta bulunamadı',
            'password.required' => 'Şifre gereklidir',
            'password.min' => 'Şifreniz en az 6 karakter olmalıdır',
        ]);

        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', '=', $email)->first();
        if (Hash::check($password, $user->password)) {
            $settings = DB::table('settings')->first();
            $smsUserName = $settings->smsUserName;
            $smsUserPassword = $settings->smsPassword;
            $loginNumber = rand(111111, 999999);
            $two_factor_recovery_codes = Str::random(40);
            $smsSendNumber = $user->tel;
            DB::table('users')->where('email', $email)->update(['two_factor_secret' => $loginNumber, 'two_factor_secret_expired' => date('YmdHis'), 'two_factor_recovery_codes' => $two_factor_recovery_codes]);
            $smsText = $email . " e-posta adresli kullanıcı için giriş şifresi : " . $loginNumber . " . Kod geçerlilik süresi 5 dakikadır.";
            function sendRequest($site_name, $send_xml, $header_type)
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $site_name);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $send_xml);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header_type);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 120);
                $result = curl_exec($ch);
                return $result;
            }

            $orgin_name = $settings->smsTitle;
            $date = date('d/m/Y H:i');
            $xml = <<<EOS
   		 <request>
   			 <authentication>
   				 <username>{$smsUserName}</username>
   				 <password>{$smsUserPassword}</password>
   			 </authentication>

   			 <order>
   	    		 <sender>{$orgin_name}</sender>
   	    		 <sendDateTime>{$date}</sendDateTime>
   	    		 <message>
   	        		 <text>{$smsText}</text>
   	        		 <receipents>
   	            		 <number>{$smsSendNumber}</number>
   	        		 </receipents>
   	    		 </message>
   			 </order>
   		 </request>
EOS;
            $result = sendRequest('http://api.iletimerkezi.com/v1/send-sms', $xml, array('Content-Type: text/xml'));
            $xml = simplexml_load_string($result);
            $json = json_encode($xml);
            $array = json_decode($json, TRUE);
            if ($array['status']['code'] == '200') {
                return redirect()->route('girisSms', $two_factor_recovery_codes);
            } else {
                return back()->with('errors', 'Sms servisinde meydana gelen hata nedeniyle giriş yapamadınız.');
            }
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('panel');
        } else {
            return back()->with('error', 'E-posta veya şifreniz hatalı, lütfen bilgileri kontrol edin.')->with('email', $request->email);
        }
    }

    public function sifremi_unuttum()
    {
        return view('back.auth.reset-step-1');
    }

    public function login_sms($two_factor)
    {
        $user = User::where('two_factor_recovery_codes', $two_factor)->first();
        $simdiki = date('Y-m-d H:i:s');
        $dateTimeS = new DateTime($simdiki);
        $timestampS = $dateTimeS->format('U');
        $kaydedilen = $user->two_factor_secret_expired;
        $dateTimeK = new DateTime($kaydedilen);
        $timestampK = $dateTimeK->format('U');
        $kalanSaniyeToplam = 300 - ($timestampS - $timestampK);
        $kalanDakika = floor($kalanSaniyeToplam / 60);
        $kalanSaniye = $kalanSaniyeToplam - ($kalanDakika * 60);
        if($kalanSaniyeToplam < 1) {
            return redirect()->route('giris')->with('error', 'Sms süresi doldu, lütfen tekrar giriş yapın.');
        }
        return view('back.auth.login-sms')->with('user', $user);
    }

    public function login_sms_post(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $simdiki = date('Y-m-d H:i:s');
        $dateTimeS = new DateTime($simdiki);
        $timestampS = $dateTimeS->format('U');
        $kaydedilen = $user->two_factor_secret_expired;
        $dateTimeK = new DateTime($kaydedilen);
        $timestampK = $dateTimeK->format('U');
        $kalanSaniyeToplam = 300 - ($timestampS - $timestampK);
        $kalanDakika = floor($kalanSaniyeToplam / 60);
        $kalanSaniye = $kalanSaniyeToplam - ($kalanDakika * 60);
        if($kalanSaniyeToplam < 1) {
            return redirect()->route('giris')->with('error', 'Sms süresi doldu, lütfen tekrar giriş yapın.');
        }

        if($user->two_factor_secret != $request->code) {
            return back()->with('error', 'Girmiş olduğunuz kod hatalı.');
        }


        if (Auth::loginUsingId($request->id, $remember = true)) {
            return redirect()->route('panel');
        } else {
            return back()->with('error', 'Giriş esnasında bir sorun meydana geldi.')->with('email', $request->email);
        }
    }

    public function logout()
    {
        if (isset(Auth::user()->id)) {
            Auth::logout();
        }
        return redirect()->route('anasayfa');
    }
}
