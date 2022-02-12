<?php

namespace App\Console\Commands;

use App\Models\Awb;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class CheckIfFlown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bondcheck:reconcile';

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
     * @return int
     */
    public function handle()
    {
        Awb::whereDoesntHave('bondchecks', function (Builder $query) {
            $query->where('date_captured', Carbon::today()->format('Y-m-d'));
        })->update(array('flown' => 1, 'flown_on' => Carbon::today()));
        Awb::whereHas('bondchecks', function (Builder $query) {
            $query->where('date_captured', Carbon::today()->format('Y-m-d'));
        })->update(array('flown' => 0, 'flown_on' => null));
    }
}
