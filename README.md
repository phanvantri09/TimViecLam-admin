E:\laragon\www\TimViecLam-admin\vendor\laravel\ui\auth-backend\AuthenticatesUsers.php

line 46 function login
        if ($this->attemptLogin($request)) {
            if (Auth::user()->type == 333) {
                if ($request->hasSession()) {
                    $request->session()->put('auth.password_confirmed_at', time());
                }

                return $this->sendLoginResponse($request);
            }
            else {
                $this->incrementLoginAttempts($request);

                return $this->sendFailedLoginResponse($request);
            }
        }
