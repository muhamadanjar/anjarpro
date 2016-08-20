<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class CekHakAksesCommand extends Command  {

	public $slug;
	

	public function __construct($slug)
	{
		$this->slug = $slug;
		
	
	}

	
	/*public function handle()
	{
		//
	}*/

}
