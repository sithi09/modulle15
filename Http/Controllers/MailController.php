<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
     
  public function index()
  {
    $data = [
      "subject"=>"Cambo Tutorial Mail",
      "body"=>"Hello Users, We will contact you as soon as possible!"
      ];
    // MailNotify class that is extend from Mailable class.
    try
    {
      Mail::to('sithishikder05@gmail.com')->send(new MailNotify($data));
      return response()->json(['Great! Successfully send in your mail']);
    }
    catch(Exception $e)
    {
      return response()->json(['Sorry! Please try again latter']);
    }
  } 
}