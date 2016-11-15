<?php

namespace App\Console\Commands;

use App\User;
use App\Events;
use Illuminate\Console\Command;

class OrderShipped extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'OrderShipped';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Output Log';

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
        // テスト用のユーザーデータをファクトリーで作成
        $user = factory(User::class)->create();

        // イベントを生成
        event(new Events\OrderShipped($user));

        echo "OK".PHP_EOL;
    }
}
