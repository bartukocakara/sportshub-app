<?php
namespace Database\Factories;

use App\Models\Court;
use App\Models\SportType;
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
        $sportType = SportType::inRandomOrder()->first();
        $court = Court::where('sport_type_id', $sportType->id)->inRandomOrder()->first();

        // Fetch files from the sport-specific directory within courts
        $files = Storage::disk('public')->files('courts/' . $sportType->path);

        // Fallback to default images if no sport-specific images found
        if (empty($files)) {
            $files = Storage::disk('public')->files('courts');
        }
        return [
            'court_id' => $court->id,
            'order' => fake()->numberBetween(1, 100),
            'file_path' => 'courts/' . $sportType->path . '/' . basename(fake()->randomElement($files)),
        ];
    }
}
