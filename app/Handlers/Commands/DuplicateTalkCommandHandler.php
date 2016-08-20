<?php namespace App\Handlers\Commands;

use App\Commands\DuplicateTalkCommand;

use Illuminate\Queue\InteractsWithQueue;

class DuplicateTalkCommandHandler {

	
	public function handle(DuplicateTalkCommand $command)
	{
		dd($command);
	}

}
