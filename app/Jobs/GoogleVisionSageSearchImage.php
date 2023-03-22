<?php

namespace App\Jobs;

use App\Models\Image;
use GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSageSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($image_id)
    {
        $this->image_id = $image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->image_id);
            if(!$i){
                return;
            }
        $image = file_get_contents(storage_path('app/public/'.$i->path));
    }
}
