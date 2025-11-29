<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestStrukturCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-struktur-command';

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
        // Test environment values
        $this->info("APP_URL from env: " . env('APP_URL'));
        $this->info("APP_URL from config: " . config('app.url'));

        // Test asset helper
        $this->info("Asset test: " . asset('storage/test.jpg'));
        $this->info("URL test: " . url('/storage/test.jpg'));

        $struktur = \App\Models\StrukturOrganisasi::all();

        $this->info("Total struktur organisasi: " . $struktur->count());

        foreach ($struktur as $item) {
            $this->line("Nama: " . $item->nama_lengkap);
            $this->line("Jabatan: " . $item->jabatan);
            $this->line("Foto: " . ($item->foto ? $item->foto : 'NULL'));
            $this->line("Foto URL: " . $item->foto_url);
            $this->line("Active: " . ($item->is_active ? 'Yes' : 'No'));
            $this->line("---");
        }

        return Command::SUCCESS;
    }
}
