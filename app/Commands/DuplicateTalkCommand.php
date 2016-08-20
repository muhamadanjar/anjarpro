<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class DuplicateTalkCommand extends Command{

	public $talk;

	public function __construct($talk)
	{
		$this->talk = $talk;
	}

	

}
