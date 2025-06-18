<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 1;
        $eventId = 'TRXEVT' . str_pad($counter++, 3, '0', STR_PAD_LEFT);

        $start = $this->faker->dateTimeBetween('+1 days', '+10 days');
        $end = (clone $start)->modify('+2 hours');

        return [
            'event_id' => $eventId,
            'event_title' => $this->faker->sentence(3),
            'event_description' => $this->faker->paragraph(3),
            'event_type' => $this->faker->randomElement(['Online', 'Offline', 'Webinar']),
            'event_location' => $this->faker->city,
            'event_tags' => implode(',', $this->faker->words(3)),
            'event_is_paid' => $this->faker->randomElement(['Gratis', 'Berbayar']),
            'event_price' => $this->faker->randomFloat(2, 0, 50000),
            'event_quota' => $this->faker->numberBetween(10, 100),
            'event_status' => 'Open Regist',
            'event_banner_img' => null, // atau simpan path dummy jika perlu
            'event_date' => $start->format('Y-m-d'),
            'event_start_time' => $start->format('H:i:s'),
            'event_end_time' => $end->format('H:i:s'),
            'event_registration_deadline' => $this->faker->dateTimeBetween('now', $start)->format('Y-m-d H:i:s'),
            'event_speaker_name' => $this->faker->name,
            'event_speaker_job' => $this->faker->jobTitle,
        ];
    }
}
