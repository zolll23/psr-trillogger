<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use VPA\Logger\ConsoleLogger;


class ConsoleLoggerTest extends TestCase
{
    private ConsoleLogger $logger;

    public function setUp(): void
    {
        parent::setUp();
        $this->logger = new ConsoleLogger();
    }

    public function testInitClass()
    {
        $this->assertTrue($this->logger instanceof ConsoleLogger);
    }

    public function testEmergency()
    {
        ob_start();
        $this->logger->emergency("testEmergency {Interpolation}",['Interpolation'=>'InterpolationEmergency']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "0;35") !== false);
        $this->assertTrue(strpos($capture, "testEmergency") !== false);
        $this->assertTrue(strpos($capture, "InterpolationEmergency") !== false);
    }

    public function testAlert()
    {
        ob_start();
        $this->logger->alert("testAlert {Interpolation}",['Interpolation'=>'InterpolationAlert']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "1;31") !== false);
        $this->assertTrue(strpos($capture, "testAlert") !== false);
        $this->assertTrue(strpos($capture, "InterpolationAlert") !== false);
    }

    public function testCritical()
    {
        ob_start();
        $this->logger->critical("testCritical {Interpolation}",['Interpolation'=>'InterpolationCritical']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "0;31") !== false);
        $this->assertTrue(strpos($capture, "testCritical") !== false);
        $this->assertTrue(strpos($capture, "InterpolationCritical") !== false);
    }

    public function testError()
    {
        ob_start();
        $this->logger->error("testError {Interpolation}",['Interpolation'=>'InterpolationError']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "0;31") !== false);
        $this->assertTrue(strpos($capture, "testError") !== false);
        $this->assertTrue(strpos($capture, "InterpolationError") !== false);
    }

    public function testWarning()
    {
        ob_start();
        $this->logger->warning("testWarning {Interpolation}",['Interpolation'=>'InterpolationWarning']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "1;37") !== false);
        $this->assertTrue(strpos($capture, "testWarning") !== false);
        $this->assertTrue(strpos($capture, "InterpolationWarning") !== false);
    }

    public function testNotice()
    {
        ob_start();
        $this->logger->notice("testNotice {Interpolation}",['Interpolation'=>'InterpolationNotice']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "1;33") !== false);
        $this->assertTrue(strpos($capture, "testNotice") !== false);
        $this->assertTrue(strpos($capture, "InterpolationNotice") !== false);
    }

    public function testInfo()
    {
        ob_start();
        $this->logger->info("testInfo {Interpolation}",['Interpolation'=>'InterpolationInfo']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "0;32") !== false);
        $this->assertTrue(strpos($capture, "testInfo") !== false);
        $this->assertTrue(strpos($capture, "InterpolationInfo") !== false);
    }

    public function testDebug()
    {
        ob_start();
        $this->logger->debug("testDebug {Interpolation}",['Interpolation'=>'InterpolationDebug']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "1;34") !== false);
        $this->assertTrue(strpos($capture, "testDebug") !== false);
        $this->assertTrue(strpos($capture, "InterpolationDebug") !== false);
    }

    public function testTable()
    {
        ob_start();
        $this->logger->table("testTable {Interpolation}",['Interpolation'=>'InterpolationDebug']);
        $capture = ob_get_clean();
        $this->assertTrue(strpos($capture, "1;37") !== false);
        $this->assertTrue(strpos($capture, "testDebug") !== false);
        $this->assertTrue(strpos($capture, "InterpolationDebug") !== false);
    }


}