<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $cast;
    protected $appoint;
    protected $corse;
    protected $delivery;
    protected $start;
    protected $place;
    protected $address;
    protected $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$cast,$appoint,$corse,$delivery,$start,$place,$address)
    {
        //

        //dd($name,$cast,$appoint,$corse,$delivery,$start,$place,$address);
        $this->title = sprintf('%sさん、ご予約承りました。', $name);
        $this->cast = $cast;
        $this->appoint = $appoint;
        $this->corse = $corse;
        $this->delivery = $delivery;
        $this->start = $start;
        $this->place = $place;
        $this->address = $address;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('emails.email')
        ->subject($this->title)
        ->with([
            'cast' => $this->cast,
            'appoint' => $this->appoint,
            'corse' => $this->corse,
            'delivery' => $this->delivery,
            'start' => $this->start,
            'place' => $this->place,
            'address' => $this->address,
            'name' => $this->name
          ]);
    }
}
