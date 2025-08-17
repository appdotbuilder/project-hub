<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectAttachment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectAttachment>
 */
class ProjectAttachmentFactory extends Factory
{
    protected $model = ProjectAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $filename = $this->faker->word . '.' . $this->faker->randomElement(['pdf', 'doc', 'docx', 'jpg', 'png']);
        
        return [
            'project_id' => Project::factory(),
            'filename' => $filename,
            'file_path' => 'uploads/' . $filename,
            'mime_type' => $this->faker->randomElement(['application/pdf', 'image/jpeg', 'image/png', 'application/msword']),
            'file_size' => $this->faker->numberBetween(1000, 5000000),
            'uploaded_by' => User::factory(),
        ];
    }
}