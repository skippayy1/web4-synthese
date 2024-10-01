<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review = new Review();
        $review->title = 'Review 1';
        $review->review = 'Review of Product 1';
        $review->rating = 5;
        $review->product_id = 1;
        $review->user_id = 1;
        $review->img_url = 'img_url';
        $review->uploaded_at = '2024-04-15';
        $review->save();

        $review = new Review();
        $review->title = 'Review 1';
        $review->review = 'Review of Product 1';
        $review->rating = 3;
        $review->product_id = 1;
        $review->user_id = 2;
        $review->img_url = 'img_url';
        $review->uploaded_at = '2024-04-15';
        $review->save();

        $review = new Review();
        $review->title = 'Review 1';
        $review->review = 'Review of Product 1';
        $review->rating = 4;
        $review->product_id = 1;
        $review->user_id = 3;
        $review->img_url = 'img_url';
        $review->uploaded_at = '2024-04-15';
        $review->save();
    }
}
