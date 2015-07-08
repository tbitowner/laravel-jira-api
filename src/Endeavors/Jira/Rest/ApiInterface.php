<?php namespace Endeavors\Jira\Rest;

interface ApiInterface
{
	public function getProjects();

	public function getProject($projectKey);

	public function getIssue($issueKey, $expand = '');

	public function search($jql, $startAt = 0, $maxResult = 20, $fields = '*navigable');

	public function api(
        $method = self::REQUEST_GET,
        $url,
        $data = array(),
        $return_as_json = false,
        $isfile = false,
        $debug = false
    );
}