<?php

namespace App\Jobs;

use App\Http\Services\PdfMakerService;
use App\Models\PdfStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class MakePdfJob implements ShouldQueue
{
    use  InteractsWithQueue;

    public $identifier;
    public $user_id;
    public $data;

    public function __construct($identifier, $user_id, $data)
    {
        $this->identifier = $identifier;
        $this->user_id = $user_id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @param \App\Services\AudioProcessor $processor
     * @return void
     */
    public function handle()
    {

       $link = PdfMakerService::getPdf($this->identifier,
            $this->user_id,
            $this->data);

       if($link == false){
           throw new \Exception();
       }
        //success
        $data = [
           'link' => $link,
            'status'=> 'success',
        ];
        PdfStatus::updateRecord($this->job->getJobId(),$data);
        Log::info('status changed to success');

    }


}

