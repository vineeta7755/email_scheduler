<?php

namespace App\Http\Controllers;

use App\EmailScheduler;
use Illuminate\Http\Request;

class EmailSchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emailscheduler.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	public function fetchSchedule(){
		$sch = DB::table('emailscheduler')->select('scheduled_at')->where('active'=>1)->get();
		echo "here in emailsch controller";exit;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		//echo "<pre>";echo $request->sc_date;
		//echo "<br>".$request->sc_time;
		$date_arr = explode('/', $request->sc_date);
		$time_arr = explode(':', $request->sc_time);
		if(empty($time_arr[1])){
			$time_arr[1] = 0;
		}
		//validations to be added to check date and time as raw data is gettng input
		
		//
		//print_r($date_arr);print_r($time_arr);
		$sc_date = date('Y-m-d H:i:s', mktime($time_arr[0], $time_arr[1], 0, $date_arr[0], $date_arr[1], $date_arr[2]));
		//echo $sc_date;
		//exit;
		$sch = new EmailScheduler;

        $sch->scheduled_at = $sc_date;

        $sch->save();
		return view('emailscheduler.emailscheduler');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailScheduler  $emailScheduler
     * @return \Illuminate\Http\Response
     */
    public function show(EmailScheduler $emailScheduler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailScheduler  $emailScheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailScheduler $emailScheduler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailScheduler  $emailScheduler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailScheduler $emailScheduler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailScheduler  $emailScheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailScheduler $emailScheduler)
    {
        //
    }
}
