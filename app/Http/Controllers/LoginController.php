<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLog;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request, FlasherInterface $flasher)
    {
        if ($_POST){

            $user = User::where('email', $request->email)->with('roles')->first();
            if (!$user){  //kulllanıcı yoksa
                $flasher->addError('User not found');
                return view('auth.login');
            }else{
                if (($user->roles[0]->name = 'Admin') && ($user->user_role == 0)){
                    if (Hash::check($request->password, $user->password)){
                        Auth::login($user);
                        $request->session()->put('adminId', $user->id);
                        $flasher->addSuccess('Login Success');
                        return redirect()->intended('/admin/home');
                    }else{
                        $flasher->addError('Password is wrong');
                        return view('auth.login');
                    }

                }
//                elseif (($user->roles[0]->name = 'Company') && ($user->user_role == 1)){
//                    if (Hash::check($request->password, $user->password)){
//                        Auth::login($user);
//                        $request->session()->put('companyId', $user->id);
//                        $flasher->addSuccess('Login Success');
//                        return redirect()->intended('/company');
//                    }else{
//                        $flasher->addError('Password is wrong');
//                        return view('auth.login');
//                    }
//                }
                elseif (($user->roles[0]->name = 'User') && ($user->user_role == 1)){
                    if (Hash::check($request->password, $user->password)){
                        Auth::login($user);
                        $request->session()->put('userId', $user->id);

                        // Kullanıcı aracısı bilgisini almak için kodu buraya yerleştirin
                        if ($request->header('User-Agent')) {
                            $userAgent = $request->header('User-Agent');
                            $platform = 'Unknown';
                            $browser = 'Unknown';

                            // İşletim Sistemi Kontrolü
                            if (preg_match('/\((.*?)\)/', $userAgent, $matches)) {
                                $platform = $matches[1];
                            }

                            // Tarayıcı Kontrolü
                            if (strpos($userAgent, 'Chrome') !== false) {
                                $browser = 'Chrome';
                            } elseif (strpos($userAgent, 'Safari') !== false) {
                                $browser = 'Safari';
                            }

                            $userAgent = $browser . ' - ' . $platform;
                        } else {
                            $userAgent = 'Unknown';
                        }

                        UserLog::create([
                            'user_id' => $user->id,
                            'ip_address' => $request->ip(),
                            //'user_agent' => $request->header('User-Agent'),
                            'user_agent' => $userAgent,
                        ]);


                        $flasher->addSuccess('Login Success');
                        return redirect()->intended('/user/home');
                    }else{
                        $flasher->addError('Password is wrong');
                        return view('auth.login');
                    }
                } else{
                    return view('auth.login');
                }

            }
            //dd($request->all());
        } else{
            return view('auth.login');
        }

    }

    public function logout()
    {
        if (\Illuminate\Support\Facades\Session::has('adminId')){
            \Illuminate\Support\Facades\Session::pull('adminId');
        }

//        if (\Illuminate\Support\Facades\Session::has('companyId')){
//            \Illuminate\Support\Facades\Session::pull('companyId');
//        }

        if (\Illuminate\Support\Facades\Session::has('userId')){
            \Illuminate\Support\Facades\Session::pull('userId');
        }

        Auth::logout();
        return Redirect::route('login');
    }
}
