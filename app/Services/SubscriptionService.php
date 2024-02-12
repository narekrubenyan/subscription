<?php

namespace App\Services;

use App\Models\User;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

/**
 * Class SubscriptionService.
 */
class SubscriptionService
{
    public function subscribe($data)
    {
        DB::beginTransaction();
        try {
            $user = User::find($data['user_id']);
            if(!$user) {
                DB::rollback();
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid User',
                    'data' => [],
                ]);
            }

            $data['email'] = $user->email;
            $subscribtion = Subscriber::firstOrCreate($data);
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Sebscribtion created Successfully',
                'data' => $subscribtion,
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
