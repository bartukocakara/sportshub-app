<?php
namespace Database\Factories;

use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourtImage>
 */
class CourtImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch files from the 'courts' directory within the 'public' disk
        $files = Storage::disk('public')->files('courts');
        // If no files are found, set a default value or handle accordingly
        $courtList = array_map('basename', $files);
        return [
            'court_id' => Court::inRandomOrder()->first()->id,
            'order' => fake()->numberBetween(1, 100),
            'file_path' => fake()->randomElement($courtList),
        ];
    }
}
