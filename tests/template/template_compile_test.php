<?php
/**
*
* @package testing
* @copyright (c) 2011 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

require_once dirname(__FILE__) . '/../../phpBB/includes/functions.php';
require_once dirname(__FILE__) . '/../../phpBB/includes/template.php';

class phpbb_template_template_compile_test extends phpbb_test_case
{
	private $template_compile;
	private $template_path;

	protected function setUp()
	{
		$this->template_compile = new phpbb_template_compile();
		$this->template_path = dirname(__FILE__) . '/templates';
	}

	public function test_in_phpbb()
	{
		$output = $this->template_compile->compile_file($this->template_path . '/trivial.html');
		$this->assertTrue(strlen($output) > 0);
		$statements = explode(';', $output);
		$first_statement = $statements[0];
		$this->assertTrue(!!preg_match('#if.*defined.*IN_PHPBB.*exit#', $first_statement));
	}
}
