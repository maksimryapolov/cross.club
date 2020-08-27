<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $client;
    private $size;
    private $product;
    private $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->client = $data['client'];
        $this->size = $data['size'];
        $this->product = $data['name_product'];
        $this->price = $data['price'];
    }

    /**
     * Build the message.
     * 
     * @return $this
     */
    public function build()
    {

        return $this->markdown('mail.index', [
            'params' => [
                'user' => $this->client,
                'product' => $this->product,
                'price' => $this->price,
                'size' => $this->size ? $this->size : 'Без размера'
            ]
        ])
        ->subject('Заказ Cross-shop');
    }
}
