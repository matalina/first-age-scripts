<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\NewCharacterRequest;

class NewCharacterApplication extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NewCharacterRequest $request)
    {
        $this->request = $request
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name')
            ->with([
            ]);
    }
}
