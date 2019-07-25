<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use App\VatInformation;


class RequestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data=array();
    protected $vatInformation;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($vatInformation,$data)
    {
        $this->vatInformation = $vatInformation;
        $this->data=$data;
     
    }

    /**
     * Determine the time at which the job should timeout.
     *
     * @return \DateTime
     */
    public function retryUntil()
    {
        return now()->addSeconds(5);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {     
        $this->vatInformation->getVatInformation()->create($this->data);
    }
}
