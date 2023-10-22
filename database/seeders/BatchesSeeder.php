<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Batch;

class BatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $batchesData = [
            [
                'year' => 2023,
                'quarter' => 'Q4',
                'months' => 'Oct, Nov, Dec',
            ],
            [
                'year' => 2024,
                'quarter' => 'Q1',
                'months' => 'Jan, Feb, Mar',
            ],
            [
                'year' => 2024,
                'quarter' => 'Q2',
                'months' => 'Apr, May, Jun',
            ],
            [
                'year' => 2024,
                'quarter' => 'Q3',
                'months' => 'Jul, Aug, Sep',
            ],
            [
                'year' => 2024,
                'quarter' => 'Q4',
                'months' => 'Oct, Nov, Dec',
            ],
            [
                'year' => 2025,
                'quarter' => 'Q1',
                'months' => 'Jan, Feb, Mar',
            ],
            [
                'year' => 2025,
                'quarter' => 'Q2',
                'months' => 'Apr, May, Jun',
            ],
            [
                'year' => 2025,
                'quarter' => 'Q3',
                'months' => 'Jul, Aug, Sep',
            ],
            [
                'year' => 2025,
                'quarter' => 'Q4',
                'months' => 'Oct, Nov, Dec',
            ],
            [
                'year' => 2026,
                'quarter' => 'Q1',
                'months' => 'Jan, Feb, Mar',
            ],
        ];

        foreach ($batchesData as $batchData) {
            Batch::create($batchData);
        }
    }
}
