<?php

namespace Cwfan\Modules\Tests;

class HelpersTest extends BaseTestCase
{
    protected $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = $this->app['files'];

        $this->artisan('make:module', ['slug' => 'helper', '--quick' => 'quick']);
    }

    /** @test */
    public function it_can_get_module_path()
    {
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper', module_path('helper'));
    }

    /** @test */
    public function it_can_get_module_path_files()
    {
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Database', module_path('helper', 'Database'));
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Database/Factories', module_path('helper', 'Database/Factories'));
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Database/Migrations', module_path('helper', 'Database/Migrations'));
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Database/Seeds', module_path('helper', 'Database/Seeds'));

        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Providers/ModuleServiceProvider.php', module_path('helper', 'Providers/ModuleServiceProvider.php'));
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Providers/RouteServiceProvider.php', module_path('helper', 'Providers/RouteServiceProvider.php'));

        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Routes/api.php', module_path('helper', 'Routes/api.php'));
        $this->assertSame(base_path().DIRECTORY_SEPARATOR.'modules/Helper/Routes/web.php', module_path('helper', 'Routes/web.php'));
    }

    /** @test */
    public function it_can_get_module_class()
    {
        $this->assertSame('Modules\Helper\Database\Factories', module_class('helper', 'Database\\Factories'));
        $this->assertSame('Modules\Helper\Database\Migrations', module_class('helper', 'Database\\Migrations'));
        $this->assertSame('Modules\Helper\Database\Seeds', module_class('helper', 'Database\\Seeds'));

        $this->assertSame('Modules\Helper\Http\Controllers', module_class('helper', 'Http\\Controllers'));

        $this->assertSame('Modules\Helper\Http\Middleware', module_class('helper', 'Http\Middleware'));
        $this->assertSame('Modules\Helper\Http\Middleware', module_class('helper', 'Http\\Middleware'));

        $this->assertSame('Modules\Helper\Providers', module_class('helper', 'Providers'));
    }

    public function tearDown(): void
    {
        $this->finder->deleteDirectory(module_path('helper'));

        //parent::tearDown()();
    }
}
