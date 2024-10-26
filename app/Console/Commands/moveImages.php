<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class moveImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mvimg';

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
        $imagesDirectory = public_path('storage/images');
        
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

        if (file_exists('./images/banner_01.png')) {
            // $this->info('banner 1 ' . file_exists('./images/banner_01.png'));
            // $this->rCommand('copy images\\banner_01.png public\\storage\\images\\');
            
            // $this->info('banner 2 ' . file_exists('./images/banner_02.png'));
            // $this->rCommand('copy images\\banner_02.png public\\storage\\images\\');

            // $this->info('banner 3 ' . file_exists('./images/banner_03.png'));
            // $this->rCommand('copy images\\banner_03.png public\\storage\\images\\');

            $this->info('banner 4 ' . file_exists('./images/server_managemenr.png'));
            $this->rCommand('copy images\\server_managemenr.png public\\storage\\images\\');

            $this->info('banner 5 ' . file_exists('./images/network_security.png'));
            $this->rCommand('copy images\\network_security.png public\\storage\\images\\');

            $this->info('banner 6 ' . file_exists('./images/database_design.png'));
            $this->rCommand('copy images\\database_design.png public\\storage\\images\\');

            $this->info('banner 7 ' . file_exists('./images/web_development.png'));
            $this->rCommand('copy images\\web_development.png public\\storage\\images\\');

            $this->info('Images moved successfully');
        } else {
            $this->error('File does not exist');
        }
    }
}
