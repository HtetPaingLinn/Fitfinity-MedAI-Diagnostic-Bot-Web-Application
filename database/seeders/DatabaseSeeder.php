<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TableNameSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TableNameSeeder::class,
            // Other seeders...
        ]);
    }
}

