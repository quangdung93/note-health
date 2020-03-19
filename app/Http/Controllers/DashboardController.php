<?php
ini_set('max_execution_time', 180);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Index;
use Mail;

class DashboardController extends Controller
{
    //
    public function index(){

    	$notes = Note::get();
    	return view('dashboard',compact('notes'));
    }

    public function getSendMailOrder(){
    	return view('mail.send_mail_order');
    }

    public function postSendMailOrder(){

    	$data = array(
    		'mail_to' => 'dungvqseo.jw@gmail.com',
    		'mail_cc' => 'quangdung.nina@gmail.com',
    	);
        
        Mail::send('mail.mail_order', $data, 
            function($message) use ($data){
                $message->to($data['mail_to']);
        		$message->cc($data['mail_cc']);
                $message->subject('[STABLEWEB] Đơn Hàng Hosting #86039');
        });

        return redirect('sendmail/order')->with('thongbao','Gửi mail thành công!');
    }

    public function getSendMailHosting(){
        return view('mail.send_mail_hosting');
    }


    public function postSendMailHosting(){

        $data = array(
            'mail_to' => 'quangdung16393@gmail.com',
            'mail_cc' => 'quangdung.nina@gmail.com',
        );
        
        Mail::send('mail.mail_buy_hosting', $data, 
            function($message) use ($data){
                $message->to($data['mail_to']);
                $message->cc($data['mail_cc']);
                $message->subject('[STABLEWEB] Thông Tin Đăng Ký Hosting');
        });

        return redirect('sendmail/hosting')->with('thongbao','Gửi mail thành công!');
    }
}
