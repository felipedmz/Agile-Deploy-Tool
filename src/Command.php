<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

class Command
{
	private $version = 'v0.0.1';
	protected $colors;

	public function __construct()
	{
		$this->colors = (object)[
			'white'  => "\033[37m",
			'red'    => "\033[31m",
			'green'  => "\033[32m",
			'yellow' => "\033[33m"
		];
	}

	public function __call($methodName, $arguments)
	{
		if (!method_exists($this, $methodName)) {
			$this->error('Command not found');
		}
	}

	public function version()
	{
		$this->println("\nAgile Deploy Tool {$this->version}\n");
	}

	private function output($color, $string)
	{
		echo "{$this->colors->$color}{$string}\n";
	}

	protected function println($string)
	{
		return $this->output('white', $string);
	}

	protected function info($string)
	{
		return $this->output('green', $string);
	}

	protected function warning($string)
	{
		return $this->output('yellow', $string);
	}

	protected function error($string)
	{
		return $this->output('red', $string);
	}
}