<?php

namespace App\Console\Commands;

use App\Mail\BondCheckReminder;
use App\Models\Airline;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class CheckIfBondCheckPerfomed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bondcheck:performed';

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
        $airlines = Airline::whereDoesntHave('logs', function (Builder $query) {
            $query->where('for_date', Carbon::today()->format('Y-m-d'))->where('send_date', Carbon::today()->format('Y-m-d'));
        })->get();
        if (!$airlines->isEmpty()) {
            Mail::to(env('MAIL_TEAM_ADDRESS'))->cc(['mnjoroge@afske.aero', 'mwalker@afske.aero', 'cgwaro@afske.aero'])->send(new BondCheckReminder($airlines));
        }
        return 0;
    }
}
