<?php

namespace Application\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;

class CreateBaseServiceCommand extends GeneratorCommand
{
    protected $signature = 'make:service {name}';

    protected $description = "Command to create a new service";

    protected function getStub()
    {
        return __DIR__ . '/stubs/service.stub';
    }

    protected function rootNamespace()
    {
        return 'Application';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $basePath = is_dir(base_path('src/Application/Services')) ? 'src/Application/Services' : $this->laravel['path'] . '/Services';
        $entityName = str_replace('\\', '/', $name);
        $serviceClassName = $entityName . 'Service.php';
        return $basePath . $entityName . $serviceClassName;
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);
        return str_replace(['DummyClass', '{{ entityName }}', '{{entityName}}'], $class, $stub);
    }
}
