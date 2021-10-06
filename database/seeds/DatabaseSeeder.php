<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatusRepairsTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(MachineTypesTableSeeder::class);
        $this->call(RoutersTableSeeder::class);
        $this->call(StatusOutputsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(WorkingStatesTableSeeder::class);
    }
}
