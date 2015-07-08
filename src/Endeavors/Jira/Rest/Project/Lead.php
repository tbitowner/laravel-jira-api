<?php namespace Endeavors\Jira\Rest\Project;

use Endeavors\Jira\Rest\JiraModel;

class Lead extends JiraModel
{
	protected $name;

	protected $displayName;

	protected $active;

	protected $lead;

	public function __construct(array $lead = array())
	{
		$this->lead = $lead;

		if(null !== $lead)
		{
			$this->loadProperties($lead);
		}
	}

	/**
	 * Create a new collection instance if the value isn't one already.
	 *
	 * @param  mixed  $items
	 * @return \Illuminate\Support\Collection
	 */
	public static function make($lead)
	{
		if (is_null($lead)) return new static;

		if ($lead instanceof Lead) return $lead;

		return new static(is_array($lead) ? $lead : array($lead));
	}
}