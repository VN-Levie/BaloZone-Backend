<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\AddressBook;

class MigrateOrderAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:order-addresses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate address data from address_books to orders table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = Order::whereNotNull('address_id')
            ->whereNull('shipping_recipient_name')
            ->get();

        $this->info("Found {$orders->count()} orders to migrate");

        $updated = 0;
        $notFound = 0;

        foreach ($orders as $order) {
            $address = AddressBook::find($order->address_id);
            if ($address) {
                $order->update([
                    'shipping_recipient_name' => $address->recipient_name,
                    'shipping_recipient_phone' => $address->recipient_phone,
                    'shipping_address' => $address->address,
                    'shipping_ward' => $address->ward,
                    'shipping_district' => $address->district,
                    'shipping_province' => $address->province,
                    'shipping_postal_code' => $address->postal_code,
                ]);
                $updated++;
                $this->line("Updated order: {$order->id}");
            } else {
                $notFound++;
                $this->warn("Address not found for order: {$order->id} (address_id: {$order->address_id})");
            }
        }

        $this->info("Migration completed!");
        $this->info("Updated: {$updated} orders");
        $this->info("Not found: {$notFound} addresses");

        return Command::SUCCESS;
    }
}
