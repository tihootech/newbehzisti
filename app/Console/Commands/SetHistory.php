<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Person;
use App\History;

class SetHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'history:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Histories of People In DB';

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
        $people = Person::all();
        History::where('user_id', 0)->delete();
        foreach ($people as $person) {
            for ($i=1; $i <=3 ; $i++) {
                if ($apply = $person->applied($i)) {
                    $h = new History;
                    $des = 'ثبت نام مددجو برای '.persian_apply_type($i);
                    $h->person_id = $person->id;
                    $h->description = $des;
                    $h->created_at = $apply->created_at;
                    $h->save();
                }
            }
        }
    }
}
