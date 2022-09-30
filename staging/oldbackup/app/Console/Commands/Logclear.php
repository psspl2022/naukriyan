<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobseeker;
use App\Admin;
use Mail;

class Logclear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loginlog:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command clear the login log table';

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

        $data = DB::table("loginlogs")
                   ->select('id','created_at')
                   ->whereDate('created_at', '<', Carbon::now()->subDays(30))
                   ->delete();
                  $words = [
                    'Log Data' => 'Log data older than 30 days is deleted successfully',
                ];
         
        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];
         
        $users = Admin::all();  
        foreach ($users as $user) {
            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('info@naukriyan.com');
                $mail->to($user->email)
                    ->subject('Log Data Cleared');
            });
        }
    }
}
