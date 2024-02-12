<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{    
    /**
     * postService
     *
     * @var mixed
     */
    private $postService;
    
    /**
     * __construct
     *
     * @param  mixed $postService
     * @return void
     */
    public function __construct(
        PostService $postService
    ) {
        $this->postService = $postService;
    }
    
    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(PostRequest $request)
    {
        $data = $request->validated();
        return $this->postService->create($data);
    }
}
