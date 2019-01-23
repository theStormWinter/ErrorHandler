<?php declare(strict_types = 1);
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

use Ninjify\Nunjuck\Environment;
use Tracy\Debugger;

if (@!include __DIR__ . '/../vendor/autoload.php') {
    echo 'Install Nette Tester using `composer update --dev`';
    exit(1);
}

define('ROOT_DIR', __DIR__);

Environment::setup(__DIR__);
Debugger::$logDirectory=TEMP_DIR;

