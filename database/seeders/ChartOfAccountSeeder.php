<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ChartsOfAccount::firstOrCreate([
            'account_type' => 'Expenses',
            'level1' => 410000,
            'level2' => null,
            'level3' => null,
            'name' => '10% From Schools Incomes',
            'description' => '10% From Schools Incomes',
            'notes' => null,
        ]);
    }
}
