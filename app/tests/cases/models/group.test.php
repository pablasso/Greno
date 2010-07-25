<?php 
/* SVN FILE: $Id$ */
/* Group Test cases generated on: 2010-07-25 16:21:04 : 1280092864*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $Group = null;
	var $fixtures = array('app.group', 'app.user');

	function startTest() {
		$this->Group =& ClassRegistry::init('Group');
	}

	function testGroupInstance() {
		$this->assertTrue(is_a($this->Group, 'Group'));
	}

	function testGroupFind() {
		$this->Group->recursive = -1;
		$results = $this->Group->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Group' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2010-07-25 16:21:04',
			'modified'  => '2010-07-25 16:21:04'
		));
		$this->assertEqual($results, $expected);
	}
}
?>