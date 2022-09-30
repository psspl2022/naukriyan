<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\ResumeViewBulkMail;


class ResumeViewBulkMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $to =null;
    public $name =null;
    public $description =null;
    public $subject =null;
    //public $from =null;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($to,$name,$description,$subject)
    {
        $this->to = $to;
        $this->name = $name;
        $this->description = $description;
        $this->subject = $subject;
        //$this->from = $from;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->to)->send(new ResumeViewBulkMail($this->name,$this->description,$this->subject));
    }
}
