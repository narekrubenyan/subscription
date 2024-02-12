<?php

namespace App\Services;

use App\Models\Post;
use App\Mail\NewPostMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 * Class PostService.
 */
class PostService
{    
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {
            $post = Post::create($data);

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sebscribtion created Successfully',
                'data' => $post,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
                'data' => $e,
            ]);
        }

    }
}
