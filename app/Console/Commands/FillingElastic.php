<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FillingElastic extends Command
{
    const HOST_ELASTIC = ['localhost:9200'];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filling:elastic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $path = storage_path() . "/test.json";

        $json = json_decode(file_get_contents($path), true);
        $client = ClientBuilder::create()->setHosts(self::HOST_ELASTIC)->build();

        foreach ($json as $value) {
            $data = [
                'index' => 'location',
                'type' => 'city',
                'id' => $value['id'],
                'body' => [
                    'name' => $value['name'],
                    'country' => $value['country']
                ],
            ];
            $client->index($data);
        }


    }
}
