<?php
/**
 * *
 *  * *
 *  *  * This library is for handling E_* errors as *Exception.
 *  *  *
 *  *  * For the full copyright and license information, please view the LICENSE
 *  *  * file that was distributed with this source code.
 *  *  *
 *  *  * @copyright 2017 - 2019 Jiří Zima<madeonweb@gmail.com>
 *  *  * @license   http://www.opensource.org/licenses/mit-license.php MIT
 *  *
 *
 */

namespace theStormwinter\ErrorHandler\Tests;


use Tester\Assert;
use Tester\TestCase;
use theStormwinter\ErrorHandler\ErrorHandler;
use theStormwinter\ErrorHandler\Exceptions\NoticeException;


require_once __DIR__ . '/../bootstrap.php';
class ErrorHandlerTest extends TestCase
{
	/** @var ErrorHandler */
	protected $handler;


	public function testExceptions()
	{
		$this->handler = new ErrorHandler;
		try {
			$data = $this->UnVar();
		}catch (NoticeException $e){
			Assert::type(NoticeException::class, $e);

//			$this->handler->disable();
		}

	}

//	public function testDisable()
//	{
//		// This must print E_NOTICE if $this->handler->disable() is active in previous test
//		$data = $this->UnVar();
//
//	}

	public function UnVar()
	{
			return $test;
	}

	public function testToString()
	{
		echo new ErrorHandler;
	}

}
(new ErrorHandlerTest)->run();