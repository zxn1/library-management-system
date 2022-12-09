<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\students;
use Carbon\Carbon;

class AutomatestudentYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automateStudentYear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is for cron job uses. Used to calculate and auto update student\'s year in database. So teacher, no need to keep modify student\'s data anymore!';

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
        //print "hello";
        $now = Carbon::now();
        //print $now;
        $stud = students::all();
        //$count = 0;
        //print $now->format('Y');
        //print ($stud[0]->created_at)->format('Y');
        for($i = 0; $i < count($stud); $i++)
        {
            //2022-12-09 12:47:10   -   created_at
            //$count++;
            //print($now->diffInYears($stud[$i]->created_at));
            //$diffYear = $now->diffInYears($stud[$i]->created_at);
            $diffYear = ($now->format('Y'))-(($stud[$i]->created_at)->format('Y'));
            if($diffYear > 0)
            {
                if(($stud[$i]->year + $diffYear) > 6)
                {
                    print 'wow';
                    $stud[$i]->delete();
                    print('Student named ' . $stud[$i]->fullname . ' due to graduate!');
                } else {
                    //print $stud[$i]->year + $diffYear;
                    //print 'ok je';
                    $findStud = students::find($stud[$i]->unique_id);
                    $findStud->year = ($stud[$i]->year + $diffYear);
                    $findStud->created_at = $now;
                    $findStud->save();
                    print('Student named ' . $stud[$i]->fullname . ' has been updated!');
                }
            }
        }
        return 0;
    }
}
