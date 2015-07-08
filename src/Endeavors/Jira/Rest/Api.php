<?php namespace Endeavors\Jira\Rest;

use chobie\Jira\Api as ChobieJiraApi;
use Illuminate\Support\Collection;

class Api extends ChobieJiraApi
{
	protected $query = null;

	protected $projectName=null;

	public function projects()
	{
		$resultCollection = new Collection($this->getProjects()->getResult());

		$this->query = $resultCollection;

		return $this->query;
	}

	public function listProjectIssues($name)
	{
		$issues = $this->search("project = $name")->getIssues();

		$this->projectName = $name;

		return $issues;
	}

	public function listAssigneeIssues($name)
	{
		$issues = $this->search("assignee = $name")->getIssues();

		return $issues;
	}

	public function project($key)
	{
		$project = Project::make($this->getProject($key));

		return $project;
		// do something with the project object
	}

	public function issue($key)
	{
		$issue = $this->getIssue($key, 'expand');

		return $issue;
	}

	public function count($value=null)
	{
		// return the count of listProjectIssues

		$count = 0;

		if( null !== $name )
		{
			$count = count($this->listProjectIssues($value));
		}
		elseif( null !== $this->projectName )
		{
			$count = count($this->listProjectIssues($this->projectName));
		}

		return $count;
	}

	public function get()
	{
		return $this->query;
	}
}