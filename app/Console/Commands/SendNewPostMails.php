<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Mail\NewPostMail;
use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewPostMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-new-post-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will senq all new post emails with queue';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::where('new', 1)->get();
        $subscribtions = Subscriber::all();

        foreach ($posts as $post) {
            foreach($subscribtions as $subscriber) {
                if ($subscriber->website_id == $post->website_id) {
                    Mail::to($subscriber->email)->send(new NewPostMail($post->title, $post->description));
                    dump("Post $post->id Mail to $subscriber->email was sent....");
                }
            }
            $post->new = 0;
            $post->save();
        }
    }
}
