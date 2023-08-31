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
            ->get();

        // Insert new records into the online database
        foreach ($admins as $admin) {
            // Update the synced flag to prevent re-syncing

            if(!$admin->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('admins')
                    ->where('id',$admin->id)
                    ->update((array)$admin);
            }

        }


        //users table
        $users = DB::connection('mysql')
            ->table('users')
            ->get();

        // Insert new records into the online database
        foreach ($users as $user) {
            // Update the synced flag to prevent re-syncing

            if(!$user->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('users')
                    ->where('id',$user->id)
                    ->update((array)$user);
            }

        }


        //clients table
        $clients = DB::connection('mysql')
            ->table('clients')
            ->get();

        // Insert new records into the online database
        foreach ($clients as $client) {
            // Update the synced flag to prevent re-syncing

            if(!$client->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('clients')
                    ->where('id',$client->id)
                    ->update((array)$client);
            }

        }


        //products table
        $products = DB::connection('mysql')
            ->table('products')
            ->get();

        // Insert new records into the online database
        foreach ($products as $product) {
            // Update the synced flag to prevent re-syncing

            if(!$product->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('products')
                    ->where('id',$product->id)
                    ->update((array)$product);
            }

        }


        //discount_reasons table
        $discount_reasons = DB::connection('mysql')
            ->table('discount_reasons')
            ->get();

        // Insert new records into the online database
        foreach ($discount_reasons as $discount_reason) {
            // Update the synced flag to prevent re-syncing

            if(!$discount_reason->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('discount_reasons')
                    ->where('id',$discount_reason->id)
                    ->update((array)$discount_reason);
            }

        }

        //============================================================================================================

        // Tickets table
        $tickets = DB::connection('mysql')
            ->table('tickets')
            ->get();


        // Insert new records into the online database
        foreach ($tickets as $ticket) {


            if(!$ticket->uploaded){
                // Update the synced flag to prevent re-syncing
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
                    ->first();

                DB::connection('online')
                    ->table('tickets')
                    ->where('id',$ticket->id)
                    ->update((array)$ticket);
            }


        }


        // Tickets table
        $reservations = DB::connection('mysql')
            ->table('reservations')
            ->get();


        // Insert new records into the online database
        foreach ($reservations as $reservation) {


            if(!$reservation->uploaded){
                // Update the synced flag to prevent re-syncing
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
                    ->first();

                DB::connection('online')
                    ->table('reservations')
                    ->where('id',$reservation->id)
                    ->update((array)$reservation);
            }


        }

        // Ticket rev models
        $ticket_rev_models = DB::connection('mysql')
            ->table('ticket_rev_models')
            ->get();

        // Insert new records into the online database
        foreach ($ticket_rev_models as $ticket_rev_model) {

            if (!$ticket_rev_model->uploaded){
                // Update the synced flag to prevent re-syncing
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
                    ->first();

                DB::connection('online')
                    ->table('ticket_rev_models')
                    ->where('id',$ticket_rev_model->id)
                    ->update((array)$ticket_rev_model);
            }

        }


        // Ticket rev products
        $ticket_rev_products = DB::connection('mysql')
            ->table('ticket_rev_products')
            ->get();

        // Insert new records into the online database
        foreach ($ticket_rev_products as $ticket_rev_product) {

            if (!$ticket_rev_product->uploaded){

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
                    ->first();

                DB::connection('online')
                    ->table('ticket_rev_products')
                    ->where('id',$ticket_rev_product->id)
                    ->update((array)$ticket_rev_product);
            }

        }



        // Payments table
        $payments = DB::connection('mysql')
            ->table('payments')
            ->get();


        // Insert new records into the online database
        foreach ($payments as $payment) {


            if(!$payment->uploaded){
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
                    ->first();

                DB::connection('online')
                    ->table('payments')
                    ->where('id',$payment->id)
                    ->update((array)$payment);
            }


        }


        // Returns table
        $returns = DB::connection('mysql')
            ->table('returns')
            ->get();


        // Insert new records into the online database
        foreach ($returns as $return) {


            if(!$return->uploaded){
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
                    ->first();

                DB::connection('online')
                    ->table('returns')
                    ->where('id',$return->id)
                    ->update((array)$return);
            }


        }

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
