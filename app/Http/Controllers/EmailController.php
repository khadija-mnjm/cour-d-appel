<?php
namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\NotificationsMail;

class EmailController extends Controller
{
    public function transfert(Request $request)
    {
        
        $user = $request->user(); 
        
        Mail::to('khadijamonajjim@gmail.com')->send(new NotificationsMail($user));
        return redirect('Electrique.situations');
    }
}
