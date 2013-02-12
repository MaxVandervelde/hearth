<?php
/**
 * CoreTest.php
 * 
 * @category Hearth
 * @package Test
 * @author Maxwell Vandervelde <Maxwell.Vandervelde@nerdery.com>
 * @version 1.1.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 */

namespace Hearth\Test\Hearth;

use Hearth\Core;
use Hearth\Test\Mock\Request as DumbRequest;
use Hearth\Exception\BuildException;
use Hearth\Test\Mock\Output as DumbOutput;
use Hearth\Test\Mock\Autoload as DumbAutoload;

use PHPUnit_Framework_TestCase as Test;

/**
 * CoreTest
 *
 * @category Hearth
 * @package Test
 * @author Maxwell Vandervelde <Maxwell.Vandervelde@nerdery.com>
 * @version 1.1.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 */
class CoreTest extends Test
{
    /**
     * Test Constructor
     * 
     * Simply test that the controller can be constructed successfully
     */
    public function testConstruct()
    {
        $core = new Core(
            new DumbRequest(null, null),
            new DumbOutput(),
            new DumbAutoload()
        );
    }

    /**
     * Test Fail Build
     *
     * Test that a build can be failed properly
     */
    public function testFailBuild()
    {
        $core = new Core(
            new DumbRequest(null, null),
            new DumbOutput(),
            new DumbAutoload()
        );
        $core->failBuild(new BuildException('Test Failure'));
        
        $this->assertTrue($core->getFailed());
    }
}
