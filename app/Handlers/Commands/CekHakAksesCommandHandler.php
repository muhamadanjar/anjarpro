<?php namespace App\Handlers\Commands;

use App\Commands\CekHakAksesCommand;

use Illuminate\Queue\InteractsWithQueue;
use DB;
class CekHakAksesCommandHandler {

	
	public function handle(CekHakAksesCommand $command)
	{
		//$results = DB::select('select * from mdl where Script=?',);
		$query = DB::table('m_module')->where('moduleslug', $command)->first(); $ktm = -1;
		/*if ($query->count() > 0) {
			$pos = strpos($query->groupid, "1");
	        if ($pos === false) {}
	        else $ktm = 1;
	    	if ($ktm <= 0) {
	         	
	        }
		}*/
		dd($query);
        
	}

}
