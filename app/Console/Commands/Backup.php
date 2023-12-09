<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup mysql database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // \Log::info("backup working fine!");

        // Specify the path to your custom MySQL configuration file
        $customConfigFile = '~/.my.cnf';

        // Build the mysqldump command with the --defaults-extra-file option
        $command = [
            'mysqldump',
            '--defaults-extra-file=' . $customConfigFile,
            'financeDB > backup.sql',
        ];

        // Create a new Process object
        $process = new Process($command);

        try {
            // Run the process
            $process->run();

            // Wait for the process to finish
            $process->wait();

            // Check if the process was successful
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Output success message or handle the output as needed
            \Log::info("Backup completed successfully:\n" . $process->getOutput());
        } catch (ProcessFailedException $exception) {
            // Handle the exception (e.g., log the error, display an error message)
            \Log::info( 'Error running mysqldump: ' . $exception->getMessage());
        }

        // mysqldump --defaults-extra-file=~/.my.cnf financeDB > dump.sql
        // return 0;
    }
}
