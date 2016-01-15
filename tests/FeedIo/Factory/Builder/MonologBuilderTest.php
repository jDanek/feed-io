<?php
namespace FeedIo\Factory\Builder;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonologBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testGetMainClassName()
    {
        $builder = new MonologBuilder();
        $this->assertEquals('Monolog\Logger', $builder->getMainClassName());
    }
    
    public function testGetPackageName()
    {
        $builder = new MonologBuilder();
        $this->assertEquals('monolog/monolog', $builder->getPackageName());
    }

    public function testNewHandler()
    {
        $builder = new MonologBuilder();
        $handler = $builder->newHandler('Monolog\Handler\StreamHandler', ['php://stdout', Logger::DEBUG]);
        
        $this->assertInstanceOf('Monolog\Handler\StreamHandler', $handler);
    }
    
    public function testGetLogger()
    {
        $builder = new MonologBuilder();
        $logger = $builder->getLogger();
        $this->assertInstanceOf('Monolog\Logger', $logger);
        
        $handlers = $logger->getHandlers();
        $this->assertCount(1, $handlers);
        
        foreach ( $handlers as $handler) {
            $this->assertInstanceOf('Monolog\Handler\StreamHandler', $handler);
        }
    }

}
