<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContactFormRequest;
use App\Http\Resources\Resource;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{

    public function store(ContactFormRequest $request)
    {
        try {
            $request->validated();
            $name = $request->get('name');
            $email = $request->get('email');
            $phone = $request->get('phone');
            $title = $request->get('title');
            $content = $request->get('content');
            $mailable = new ContactForm($name,$email,$phone,$title,$content);
            $toEmail = 'bestbtech16@gmail.com';
            Mail::to($toEmail)->send($mailable);
            return new Resource([
                'success' => 'Gửi thông tin thành công'
            ]);

        }catch (\Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }
}
