<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(LocationLimitsTableSeeder::class);
        $this->call(CartsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderProductsTableSeeder::class);
        $this->call(OrderRatingsTableSeeder::class);
        $this->call(OrderTransactionsTableSeeder::class);
        $this->call(PageViewsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProviderLocationsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
