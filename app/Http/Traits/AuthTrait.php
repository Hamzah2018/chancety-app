<?php
namespace App\Http\Traits;
use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function checkGuard($request){

        if($request->type == 'admin'){
                $guardName = 'admin';
            }
        elseif ($request->type == 'customer'){
                $guardName = 'customer';
            }
        else{
                $guardName = 'web';
            }
        return $guardName;
    }
    public function redirect($request){
            if ($request->type == 'admin') {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            }
            elseif ($request->type == 'customer') {
                return redirect()->intended(RouteServiceProvider::CUSTOMER);
            }
            else{
                return redirect()->intended(RouteServiceProvider::HOME);
            }
    }

}
