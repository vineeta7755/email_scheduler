<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will send the promotional email to users';

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
        
		//fetch list of users (name & emailID)
		$users = DB::table('users')->select('id','name','email')->get();
		$email_temp = "This is a promotional emailer";
		try {
			$to_emails = '';
			foreach($users as $user){
				if(!empty( $user->email))
				{
					$to_emails.= $user->email.",";
				}	
			}
			$to_emails = substr($to_emails,0,-1);
			Mail::send(('emails.welcome'), function($m)  use ($subscription,$email_temp)
			{
				$m->from('admin@laraveljobs.com', 'Laravel');
				$m->to($to_emails);
				$m->subject('Welcome');
			});
				
			
		} catch (\Exception $e) {
			
		}
		return 0;
		
    }
}
