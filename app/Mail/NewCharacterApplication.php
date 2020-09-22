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
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('character.email')
            ->with([
                'first_name' => $this->request->get('first_name'),
                'last_name' => $this->request->get('last_name'),
                'username' => $this->request->get('username'),
                'age' => $this->request->get('age'),
                'origin' => $this->request->get('origin'),
                'job' => $this->request->get('job'),
                'personality' => $this->request->get('personality'),
                'description' => $this->request->get('description'),
                'biography' => $this->request->get('biography'),
                'powers' => $this->request->get('powers'),
                'i_can_channel' => $this->request->get('i_can_channel'),
                'current_strength' => $this->request->get('current_strength'),
                'potential_strength' => $this->request->get('potential_strength'),
                'experience' => $this->request->get('experience'),
                'reborn_god' => $this->request->get('reborn_god'),
                'series_author_name' => $this->request->get('series_author_name'),
                'rate_us' => $this->request->get('rate_us'),
            ]);
    }
}
