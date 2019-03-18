<?php

declare(strict_types=1);

namespace Skeleton\Dart\Test\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IntegrationCase extends WebTestCase
{
    protected static $kernel;

    protected function setUp(): void
    {
        static::$kernel = static::bootKernel(['debug' => false, 'environment' => 'integration']);

        $this->purgeDatabase();

        parent::setUp();
    }

    protected function get(string $service)
    {
        return static::$kernel->getContainer()->get($service);
    }

    protected function getParameter(string $parameter)
    {
        return static::$kernel->getContainer()->getParameter($parameter);
    }

    protected function purgeDatabase()
    {
        $connection = $this->get('database_connection');
        $tables = ['party'];

        $sql = '';
        foreach ($tables as $table) {
            $sql.= sprintf('DELETE FROM %s;', $table);
        }

        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }
}
