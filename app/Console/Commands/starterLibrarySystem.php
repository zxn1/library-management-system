<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\userInfo;
use Illuminate\Support\Facades\Hash;

class starterLibrarySystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starterLibrary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just act like a seeder. But much easier!';

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
    public function handle()  //call : 'php artisan starterLibrary'
    {
        //create Full access account
        print 'First Account Proces ------------------------------------------';
        $user = new User;
        $user->name = 'Siti Jamilah';
        $user->email = 'cikgu@gmail.com';
        $user->password = Hash::make('admin');
        if($user->save())
        {
            print ('success creating account for Siti Jamilah');
            $usrinf = new userInfo;
            $usrinf->user_id = $user->id;
            $usrinf->role = 1;
            $usrinf->gender = 2;
            if($usrinf->save())
            {
                print 'success creating Siti Jamilah\'s info.';
            } else {
                print 'Failed to create Siti Jamilah\'s info.';
            }
        } else {
            print 'Failed to create Siti Jamilah\'s info.';
        }

        print 'Second Account Proces ------------------------------------------';
        $user = new User;
        $user->name = 'Ahmad Zaki';
        $user->email = 'pengawas@gmail.com';
        $user->password = Hash::make('admin');
        if($user->save())
        {
            print ('success creating account for Ahmad Zaki');
            $usrinf = new userInfo;
            $usrinf->user_id = $user->id;
            $usrinf->role = 2;
            $usrinf->gender = 1;
            if($usrinf->save())
            {
                print 'success creating Ahmad Zaki\'s info.';
            } else {
                print 'Failed to create Ahmad Zaki\'s info.';
            }
        } else {
            print 'Failed to create Ahmad Zaki\'s info.';
        }

        print '#### -Creating account process complete- ####';

        //creating first startup setting
        $setting = new setting;
        $setting->chargeperday = 0.1;
        $setting->admin_key = 'admin';
        if($setting->save())
        {
            print 'Successful create a first setting for the library system!';
        } else {
            print 'Failed to create a first setup for library system.';
        }
        print 'Operation complete!';
        return 0;
    }
}
