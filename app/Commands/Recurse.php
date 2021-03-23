<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Intervention\Image\ImageManagerStatic;
use LaravelZero\Framework\Commands\Command;

class Recurse extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'recurse {source} {x} {y} {width} {height} {--recursion=6} {--out=}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Recurse a phone in itself.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $out = $this->option('out') ?? base_path('out.png');
        $source = $this->argument('source');
        $x = $this->argument('x');
        $y = $this->argument('y');
        $width = $this->argument('width');
        $height = $this->argument('height');
        $recursion = $this->option('recursion');
        $sourceImage = ImageManagerStatic::make($source);
        $insertedImage = clone $sourceImage;

        for ($i = 0; $i < $recursion; $i++) {
            $insertedImage->resize($width, $height);

            $sourceImage->insert($insertedImage, 'top-left', $x, $y);

            $insertedImage = clone $sourceImage;
        }

        $insertedImage->destroy();
        $sourceImage->save($out);

        $this->info('Image generated.');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
