<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = 'backup-' . date('Y-m-d') . '.sql';
        $command = 'mysqldump --user=root --password= --all-databases > ' . storage_path('app/' . $filename);
        exec($command);
    }
}
