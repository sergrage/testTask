<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Comment;

class ApiComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 2;

    protected $title;
    protected $body;
    protected $article_id;

    public function __construct($title, $body, $article_id)
    {
        $this->title = $title;
        $this->body = $body;
        $this->article_id = $article_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // throw new \Exception("error", 101);

        // info($this->title);
        // info($this->body);
        // info($this->article_id);

        $comment = Comment::create([
            'title'   => $this->title,
            'body'    =>  $this->body,
            'article_id' => $this->article_id
            ]
        );
    }
}
