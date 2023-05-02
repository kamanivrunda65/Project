<?php

namespace App\Mail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Request;


class Notificationmail extends Mailable
{
    use Queueable, SerializesModels;
    public $nmaildata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nmaildata)
    {
        $this->nmaildata = $nmaildata;   
         //dd($nmaildata);
        $notification=new Notification;
        $user =new User;
        $userdata=$user->find($nmaildata['user_id']);
        $notification->msg=$nmaildata['msg'];
        $notification->user_id=$nmaildata['user_id'];
        $notification->link=$nmaildata['link'];
        $notification->pic=$userdata->profile_pic;
        // $notification->save();
        $data=session()->all();
        dd($data);
        if(Auth::user()->id==$nmaildata['user_id']){
            toastr()->success($nmaildata['msg']);
        }
        dd($nmaildata);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Update  from GET-UNSATCK',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'layouts.notificationmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
