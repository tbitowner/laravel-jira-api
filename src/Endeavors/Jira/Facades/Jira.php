<?php namespace Endeavors\Jira\Facades;

use Illuminate\Support\Facades\Facade;

class Jira extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'jira'; }

}