<?php
/**
 * @author h.woltersdorf
 */

namespace Fortuneglobe\IceHawk\Tests\Unit\Forms;

use Fortuneglobe\IceHawk\Forms\FormData;
use Fortuneglobe\IceHawk\Forms\FormFeedback;

class FormDataTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetMessagesAfterAddingFeedback()
	{
		$messages = [ 'Unit', 'Test', 'Messages' ];

		$formData = new FormData();
		$formData->addFeedback( 'unit.test', $messages );

		$this->assertEquals( $messages, $formData->getMessages( 'unit.test' ) );
	}

	/**
	 * @param $severity
	 *
	 * @dataProvider severityProvider
	 */
	public function testCanGetSeverityAfterAddingFeedback( $severity )
	{
		$messages = [ 'Unit', 'Test', 'Messages' ];

		$formData = new FormData();
		$formData->addFeedback( 'unit.test', $messages, $severity );

		$this->assertEquals( $severity, $formData->getSeverity( 'unit.test' ) );
	}

	public function severityProvider()
	{
		return [
			[ FormFeedback::NONE ],
			[ FormFeedback::DANGER ],
			[ FormFeedback::INFO ],
			[ FormFeedback::WARNING ],
			[ FormFeedback::SUCCESS ],
		];
	}

	public function testFeedbackOverridesFeedbackWithSameKey()
	{
		$messages_original = [ 'Unit', 'Test', 'Messages' ];
		$messages_override = [ 'Messages', 'Override' ];

		$formData = new FormData();
		$formData->addFeedback( 'unit.test', $messages_original );
		$formData->addFeedback( 'unit.test', $messages_override );

		$this->assertEquals( $messages_override, $formData->getMessages( 'unit.test' ) );
	}

	public function testGetMessagesReturnsEmptyArrayWhenKeyIsNotSet()
	{
		$formData = new FormData();

		$this->assertEquals( [ ], $formData->getMessages( 'unit.test' ) );
	}

	public function testGetSeverityReturnsSeverityNoneWhenKeyIsNotSet()
	{
		$formData = new FormData();

		$this->assertEquals( FormFeedback::NONE, $formData->getSeverity( 'unit.test' ) );
	}

	public function testCanGetAllMessages()
	{
		$formData         = new FormData();
		$expectedMessages = [ 'Message 1', 'Message 2', 'Message 3', 'Message 4' ];

		$formData->addFeedback( 'unit.test.1', [ 'Message 1', 'Message 2' ] );
		$formData->addFeedback( 'unit.test.2', [ 'Message 3', 'Message 4' ] );

		$this->assertEquals( $expectedMessages, $formData->getAllMessages() );
	}
}
