<?php

/**
 * Class "Syslog"
 *
 * PHP version 5.6/7
 *
 * @package PhpLogger
 * @author  "Daniel Rendon Arias (ddniel16)" <ddniel16@gmail.com>
 * @license https://opensource.org/licenses/EUPL-1.1 European Union Public Licence (V. 1.1)
 * @version Release: @package_version@
 * @link    https://github.com/ddniel16/php-logger
 */

namespace PhpLogger;

use PhpLogger\SyslogInterface;

/**
 * This class send messages to syslog
 *
 * @package PhpLogger
 * @author  "Daniel Rendon Arias (ddniel16)" <ddniel16@gmail.com>
 * @license https://opensource.org/licenses/EUPL-1.1 European Union Public Licence (V. 1.1)
 * @version Release: @package_version@
 * @link    https://github.com/ddniel16/php-logger
 */
class Syslog implements SyslogInterface
{

    /**
     * Identification tag in syslog
     *
     * @var string
     */
    protected $_syslogTag;

    /**
     * __construct
     *
     * @param string $syslogTag Identification tag in syslog
     */
    public function __construct(string $syslogTag = 'PhpLogger')
    {
        $this->_syslogTag = $syslogTag;
    }

    /**
     * Saves the log message
     *
     * @param string $message     log message
     * @param int    $priority    priority by syslog
     * @param string $priorityMsg Tag from priority
     */
    public function writeLog(
        string $message,
        int $priority = LOG_DEBUG,
        string $priorityMsg = '[debug]'
    )
    {

        openlog($this->_syslogTag, LOG_NDELAY | LOG_PID, LOG_LOCAL0);
        syslog($priority, $priorityMsg . ' ' . $message);
        closelog();

    }

}
