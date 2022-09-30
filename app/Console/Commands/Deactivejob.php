<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobseeker;
use App\Admin;
use Mail;

class Deactivejob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postjob:deactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will deactivate post job automatically according to their last apply date';

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
        $current_date = Carbon::now();
        $data = DB::table('jobmanagers')
        ->select('id','title','description')
        ->whereDate('last_apply_date', $current_date)
        ->update(['status' => 'Deactive']);
               $words = [
            'Job Deactive' => 'Last Apply Date job deactive automatically'
        ];
         
        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];
         
        $users = Admin::all();
        foreach ($users as $user) {
            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('info@naukriyan.com');
                $mail->to($user->email)
                    ->subject('Job Deactive Successfully');
            });
        }
        return response()->json(['data' => $data], 200);
        
    }
}
