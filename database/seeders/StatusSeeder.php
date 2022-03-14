<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'Active',
            'Inactive',
            'Waiting Approval'
        ];

        foreach ($status as $s) {
            Status::create(['status_name' => $s]);
        }
    }
}
