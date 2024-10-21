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

        $this->rCommand('php artisan storage:link');
        $this->rCommand('mkdir public/storage/images'); // Directly create the directory

        if (file_exists(public_path('images/banner_01.png'))) {
            $this->info('banner 1 exists');
            $this->rCommand('copy ' . public_path('images/banner_01.png') . ' ' . public_path('storage/images/'));
        } else {
            $this->error('File does not exist');
        }

        // Additional banners can be processed similarly
    }
}
