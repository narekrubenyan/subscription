<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{    
    /**
     * subscriptionService
     *
     * @var mixed
     */
    private $subscriptionService;
    
    /**
     * __construct
     *
     * @param  mixed $subscriptionService
     * @return void
     */
    public function __construct (
        SubscriptionService $subscriptionService
    ) {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * subscribe
     *
     * @param  mixed $request
     * @return void
     */
    public function subscribe(SubscriptionRequest $request)
    {
        $data = $request->validated();

        return $this->subscriptionService->subscribe($data);
    }
}
