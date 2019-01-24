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

namespace theStormwinter\ErrorHandler;


use theStormwinter\ErrorHandler\Exceptions\CompileErrorException;
use theStormwinter\ErrorHandler\Exceptions\CoreErrorException;
use theStormwinter\ErrorHandler\Exceptions\CoreWarningException;
use theStormwinter\ErrorHandler\Exceptions\DeprecatedException;
use theStormwinter\ErrorHandler\Exceptions\ErrorException;
use theStormwinter\ErrorHandler\Exceptions\NoticeException;
use theStormwinter\ErrorHandler\Exceptions\ParseException;
use theStormwinter\ErrorHandler\Exceptions\RecoverableErrorException;
use theStormwinter\ErrorHandler\Exceptions\StrictException;
use theStormwinter\ErrorHandler\Exceptions\UserDeprecatedException;
use theStormwinter\ErrorHandler\Exceptions\UserErrorException;
use theStormwinter\ErrorHandler\Exceptions\UserNoticeException;
use theStormwinter\ErrorHandler\Exceptions\UserWarningException;
use theStormwinter\ErrorHandler\Exceptions\WarningException;


/**
 * Class ErrorHandler
 * @package theStormwinter\ErrorHandler
 */
class ErrorHandler
{

	public const VERSION = '1.0.0';

	/**
	 * ErrorHandler constructor.
	 */
	public function __construct()
	{
		$this->enable();
	}

	/**
	 * This enable this handler
	 */
	protected function enable() :void
	{
		set_error_handler([$this, 'errors']);
	}

	/**
	 * This disable this handler
	 */
	public function disable() :void
	{
		restore_error_handler();
	}

	/**
	 * @param $errno
	 * @param $errstr
	 * @param $errfile
	 * @param $errline
	 *
	 * @throws CompileErrorException
	 * @throws CoreErrorException
	 * @throws CoreWarningException
	 * @throws DeprecatedException
	 * @throws ErrorException
	 * @throws NoticeException
	 * @throws ParseException
	 * @throws RecoverableErrorException
	 * @throws StrictException
	 * @throws UserDeprecatedException
	 * @throws UserErrorException
	 * @throws UserNoticeException
	 * @throws UserWarningException
	 * @throws WarningException
	 */
	public function errors(int $errno, string $errstr, string $errfile, int $errline) :void
	{
				switch ($errno) {
					case E_ERROR:
						throw new ErrorException            ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_WARNING:
						throw new WarningException          ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_PARSE:
						throw new ParseException            ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_NOTICE:
						throw new NoticeException           ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_CORE_ERROR:
						throw new CoreErrorException        ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_CORE_WARNING:
						throw new CoreWarningException      ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_COMPILE_ERROR:
						throw new CompileErrorException     ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_COMPILE_WARNING:
						throw new CoreWarningException      ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_USER_ERROR:
						throw new UserErrorException        ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_USER_WARNING:
						throw new UserWarningException      ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_USER_NOTICE:
						throw new UserNoticeException       ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_STRICT:
						throw new StrictException           ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_RECOVERABLE_ERROR:
						throw new RecoverableErrorException ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_DEPRECATED:
						throw new DeprecatedException       ($this->createBody($errstr, $errfile, $errline)
							, $errno);

					case E_USER_DEPRECATED:
						throw new UserDeprecatedException   ($this->createBody($errstr, $errfile, $errline)
							, $errno);
				}
			

	}

	/**
	 * Creates body for exceptions
	 *
	 * @param $errstr
	 * @param $errfile
	 * @param $errline
	 *
	 * @return string
	 */
	protected function createBody(string $errstr, string $errfile, int $errline) :string
	{
		return $errstr . ' in ' . $errfile . ' on line ' . $errline;
	}

	public function __toString()
	{
		return __NAMESPACE__ . ", version: " . self::VERSION;
	}


}


