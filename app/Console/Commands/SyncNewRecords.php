<?php
namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;


class SyncNewRecords extends Command
{
    protected $signature = 'sync:new-records';
    protected $description = 'Sync new records from local database to online database';

    public function handle(){


        //admins table
        $admins = DB::connection('mysql')
            ->table('admins')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($admins as $admin) {
            // Update the synced flag to prevent re-syncing

            $admin_online = DB::connection('online')
                ->table('admins')
                ->where('id',$admin->id)
                ->first();


            if(!$admin_online){

                DB::connection('mysql')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('admins')
                    ->insert((array)$admin);

                DB::connection('online')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update((array)$admin);


                DB::connection('online')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update(['uploaded' => true]);
            }

        }


        //users table
        $users = DB::connection('mysql')
            ->table('users')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($users as $user) {
            // Update the synced flag to prevent re-syncing

            $user_online = DB::connection('online')
                ->table('users')
                ->where('id',$user->id)
                ->first();

            if(!$user_online){

                DB::connection('mysql')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('users')
                    ->insert((array)$user);

                DB::connection('online')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update((array)$user);

                DB::connection('online')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update(['uploaded' => true]);
            }

        }


        //clients table
        $clients = DB::connection('mysql')
            ->table('clients')
            ->where('uploaded','=',false)
            ->get();


        // Insert new records into the online database
        foreach ($clients as $client) {
            // Update the synced flag to prevent re-syncing

            $client_online = DB::connection('online')
                ->table('clients')
                ->where('id',$client->id)
                ->first();

            if(!$client_online){

                DB::connection('mysql')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('clients')
                    ->insert((array)$client);

                DB::connection('online')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update((array)$client);

                DB::connection('online')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update(['uploaded' => true]);
            }

        }



        //products table
        $products = DB::connection('mysql')
            ->table('products')
            ->where('uploaded','=',false)
            ->get();


        // Insert new records into the online database
        foreach ($products as $product) {
            // Update the synced flag to prevent re-syncing

            $product_online = DB::connection('online')
                ->table('products')
                ->where('id',$product->id)
                ->first();

            if(!$product_online){

                DB::connection('mysql')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('products')
                    ->insert((array)$product);

                DB::connection('online')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update((array)$product);

                DB::connection('online')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update(['uploaded' => true]);
            }

        }



        //discount_reasons table
        $discount_reasons = DB::connection('mysql')
            ->table('discount_reasons')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($discount_reasons as $discount_reason) {
            // Update the synced flag to prevent re-syncing

            $discount_reason_online = DB::connection('online')
                ->table('discount_reasons')
                ->where('id',$discount_reason->id)
                ->first();

            if(!$discount_reason_online){

                DB::connection('mysql')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('discount_reasons')
                    ->insert((array)$discount_reason);

                DB::connection('online')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update(['uploaded' => true]);
            }else{

                  DB::connection('mysql')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update((array)$discount_reason);

                DB::connection('online')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update(['uploaded' => true]);
            }

        }




        //tickets table
        $tickets = DB::connection('mysql')
            ->table('tickets')
            ->where('uploaded','=',false)
            ->get();


        // Insert new records into the online database
        foreach ($tickets as $ticket) {
            // Update the synced flag to prevent re-syncing

            $ticket_online = DB::connection('online')
                ->table('tickets')
                ->where('id',$ticket->id)
                ->first();

            if(!$ticket_online){

                DB::connection('mysql')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('tickets')
                    ->insert((array)$ticket);

                DB::connection('online')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update((array)$ticket);

                DB::connection('online')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update(['uploaded' => true]);
            }

        }



        //reservations table
        $reservations = DB::connection('mysql')
            ->table('reservations')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($reservations as $reservation) {
            // Update the synced flag to prevent re-syncing

            $reservation_online = DB::connection('online')
                ->table('reservations')
                ->where('id',$reservation->id)
                ->first();

            if(!$reservation_online){

                DB::connection('mysql')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('reservations')
                    ->insert((array)$reservation);

                DB::connection('online')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update((array)$reservation);

                DB::connection('online')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update(['uploaded' => true]);
            }

        }



        //ticket_rev_models table
        $ticket_rev_models = DB::connection('mysql')
            ->table('ticket_rev_models')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($ticket_rev_models as $ticket_rev_model) {
            // Update the synced flag to prevent re-syncing

            $ticket_rev_model_online = DB::connection('online')
                ->table('ticket_rev_models')
                ->where('id',$ticket_rev_model->id)
                ->first();

            if(!$ticket_rev_model_online){

                DB::connection('mysql')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('ticket_rev_models')
                    ->insert((array)$ticket_rev_model);

                DB::connection('online')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update((array)$ticket_rev_model);

                DB::connection('online')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update(['uploaded' => true]);
            }

        }



        //ticket_rev_products table
        $ticket_rev_products = DB::connection('mysql')
            ->table('ticket_rev_products')
            ->where('uploaded','=',false)
            ->get();

        // Insert new records into the online database
        foreach ($ticket_rev_products as $ticket_rev_product) {


            $ticket_rev_product_online = DB::connection('online')
                ->table('ticket_rev_products')
                ->where('id',$ticket_rev_product->id)
                ->first();

            if (!$ticket_rev_product_online){

                // Update the synced flag to prevent re-syncing
                DB::connection('mysql')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('ticket_rev_products')
                    ->insert((array)$ticket_rev_product);

                DB::connection('online')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update((array)$ticket_rev_product);

                DB::connection('online')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update(['uploaded' => true]);

            }

        }


        // Payments table
        $payments = DB::connection('mysql')
            ->table('payments')
            ->where('uploaded','=',false)
            ->get();


        // Insert new records into the online database
        foreach ($payments as $payment) {

            $payment_online = DB::connection('online')
                ->table('payments')
                ->where('id',$payment->id)
                ->first();


            if(!$payment_online){
                // Update the synced flag to prevent re-syncing
                DB::connection('mysql')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('payments')
                    ->insert((array)$payment);

                DB::connection('online')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update((array)$payment);

                DB::connection('online')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update(['uploaded' => true]);

            }
        }



        // Returns table
        $returns = DB::connection('mysql')
            ->table('returns')
            ->where('uploaded','=',false)
            ->get();


        // Insert new records into the online database
        foreach ($returns as $return) {


            $return_online = DB::connection('online')
                ->table('returns')
                ->where('id',$return->id)
                ->first();


            if(!$return_online){
                // Update the synced flag to prevent re-syncing
                DB::connection('mysql')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('returns')
                    ->insert((array)$return);

                DB::connection('online')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update(['uploaded' => true]);
            }else{

                DB::connection('mysql')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update(['uploaded' => true]);

                DB::connection('online')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update((array)$return);

                DB::connection('online')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update(['uploaded' => true]);

            }


        }

        //end new sync data ---------------------------------------------------------------------------------------



//        $threeDaysAgo = Carbon::now()->subDays(3); // 13-08-2023 => 10-08-2023
//
//        DB::table('tickets')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();
//        DB::table('reservations')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();
//        DB::table('ticket_rev_models')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();
//        DB::table('ticket_rev_products')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();
//        DB::table('payments')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();
//        DB::table('returns')->where('uploaded','=',1)->whereDate('created_at', '=',$threeDaysAgo)->delete();

        $this->info(count($admins) . ' new records synchronized.');
    }
}

//php artisan sync:new-records
