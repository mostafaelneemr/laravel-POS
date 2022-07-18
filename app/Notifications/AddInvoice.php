<?php

namespace App\Notifications;

use App\Models\invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AddInvoice extends Notification
{
    use Queueable;
    private $invoice;

    public function __construct(invoice $invoice)
    {   
        $this->invoice = $invoice;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            // 'data' => $this->details['body'],
            'id'=>$this->invoice->id,
            'title'=> trans('backend/main-sidebar.add invoice noti'),
            'user'=>Auth::user()->name,
        ];
    }
}
