<?php

namespace App\Console\Commands;

use App\Model\UserSubscription;
use Illuminate\Console\Command;

class UserSubscriptionExpiration extends Command
{

    protected $signature = 'subscription:expired';

    protected $description = 'User subscription expired when subscription over';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $this->info('================== Job start ==================');
            $toDay = date('Y-m-d');

            $subscriptions = UserSubscription::with("user")->where("is_active",true)->get();

            if(!empty($subscriptions)) {

                foreach ($subscriptions as $subscription) {
                    $this->info('--------------------------------');
                    $this->info('Subscription id: ' . $subscription->id);
                    $this->info('User id: ' . $subscription->user_id);

                    $credit = $subscription->credits_limit;

                    if($subscription->credits_type == "month"){
                        $subscriptionExpiredDate = date('Y-m-d', strtotime("+$credit months", strtotime($subscription->created_at)));
                    }elseif($subscription->credits_type == "year"){
                        $subscriptionExpiredDate = date('Y-m-d', strtotime("+$credit years", strtotime($subscription->created_at)));
                    }else{
                        $subscriptionExpiredDate = date('Y-m-d', strtotime("+$credit days", strtotime($subscription->created_at)));
                    }

//                    echo "<pre>";print_r($subscriptionExpiredDate);exit();

                    if($subscriptionExpiredDate < $toDay){
                        $subscription->is_active = false;
                        $subscription->save();

                        $this->info('Subscription Status: Expired');
                        $this->info('--------------------------------');
                    }


                }
            }else{
                $this->info('Today no any user subscription expired.');
            }
            $this->info('================== Job end ==================');
        }catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }

    }
}
