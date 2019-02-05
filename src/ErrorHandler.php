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





use theStormwinter\CompileErrorException;
use theStormwinter\CoreErrorException;
use theStormwinter\CoreWarningException;
use theStormwinter\DeprecatedException;
use theStormwinter\ErrorException;
use theStormwinter\NoticeException;
use theStormwinter\ParseException;
use theStormwinter\RecoverableErrorException;
use theStormwinter\StrictException;
use theStormwinter\UserDeprecatedException;
use theStormwinter\UserErrorException;
use theStormwinter\UserNoticeException;
use theStormwinter\UserWarningException;
use theStormwinter\WarningException;


/**
 * Class ErrorHandler
 * @package theStormwinter\ErrorHandler
 */
class ErrorHandler
{

	public const VERSION = '1.1.0';


	/**
	 * This enable this handler
	 */
	public function enable() :void
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

	public function __toString() : string
	{
		return __NAMESPACE__ . ", version: " . self::VERSION;
	}


}


