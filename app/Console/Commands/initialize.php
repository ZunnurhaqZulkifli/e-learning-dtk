<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically setup the application server.';

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
        $progress = $this->output->createProgressBar(100);
        $this->info(' ');
        $this->info('Starting the application setup process...');
        $this->warn('Signed by: ' . '~z.z~');

        $progress->start();

        // Pulling the latest changes from the repository
        $this->info(' ');
        $this->info('Pulling Changes...');
        $this->info(' ');
        $npmInstallStatus = $this->rCommand('git pull');

        $this->info('Installing Updates...');

        for($i = 0; $i < 80; $i++) {
            $progress->advance(1);
            usleep(25000);
        }
        
        if ($npmInstallStatus !== 0) {
            $this->info(' ');
            $this->error('Git pull failed!, contanct the administrator');
            return;
        }


        $progress->finish();

        $this->info(' ');
        $this->info('App Ready To Launch...');
    }
}
