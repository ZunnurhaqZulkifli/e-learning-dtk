<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected function rCommand($command)
    {
        $process = proc_open($command, [
            1 => ['pipe', 'w'], // stdout
            2 => ['pipe', 'w'], // stderr
        ], $pipes);

        if (is_resource($process)) {
            while ($line = fgets($pipes[1])) {
                $this->warn($line);
            }

            while ($line = fgets($pipes[2])) {
                $this->error($line);
            }

            fclose($pipes[1]);
            fclose($pipes[2]);

            return proc_close($process);
        }

        return 1;
    }

    public function handle()
    {
        $this->info('Current Directory: ' . getcwd());

        // Ensure storage link
        $this->rCommand('php artisan storage:link');

        // Define the directory path for images
        $imagesDirectory = public_path('storage/images');

        // Create the images directory if it doesn't exist
        if (!is_dir($imagesDirectory)) {
            if (mkdir($imagesDirectory, 0755, true)) {
                $this->info('Created directory: ' . $imagesDirectory);
            } else {
                $this->error('Failed to create directory: ' . $imagesDirectory);
                return;
            }
        } else {
            $this->info('Directory already exists: ' . $imagesDirectory);
        }

        // Check if the image exists and copy
        $sourcePath = public_path('images/banner_01.png');
        if (file_exists($sourcePath)) {
            $this->info('banner 1 exists');
            // Use PHP's copy function instead of a shell command
            if (copy($sourcePath, $imagesDirectory . '/banner_01.png')) {
                $this->info('banner 1 copied successfully');
            } else {
                $this->error('Failed to copy banner 1');
            }
        } else {
            $this->error('File does not exist: ' . $sourcePath);
        }
    }
}
