<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class ShowPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:posts  {tag}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'display of posts that match a given tag';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tag = Tag::whereName( $this->argument('tag'))->first();
        
       if($tag){
 
                $tag->posts->each(function($post){
                    
                    $this->info('----------------------------');
                    $this->info('id : ');
                    dump($post->id);
                    $this->info('title : ');
                    dump($post->title);
                    $this->info('content : ');
                    dump($post->content);
                });
                
       }else{

        $this->warn('la liste est vide ');
       }

    }
}
