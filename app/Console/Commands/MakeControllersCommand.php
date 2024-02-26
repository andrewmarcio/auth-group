<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;

class MakeControllersCommand extends Command
{
    protected function rootNamespace()
    {
        return 'Presentation';
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $basePath = is_dir(base_path('src/Presentation')) ? 'src/Presentation' : $this->laravel['path'] . '/Http';
        return $basePath . str_replace('\\', '/', $name) . '.php';
    }

    protected function getNamespace($name) {
        return 'Presentation\\Controllers';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return 'Presentation\\Controllers';
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
        $path = str_replace($this->getNamespace($name).'\\', '', $name);
        $arrayClass = explode('\\', $path);
        $class = end($arrayClass);
        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['DummyNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            ['{{ namespace }}', '{{ rootNamespace }}', '{{ namespacedUserModel }}'],
            ['{{namespace}}', '{{rootNamespace}}', '{{namespacedUserModel}}'],
        ];

        foreach ($searches as $search) {
            $stub = str_replace(
                $search,
                [$this->getNamespace($name), 'App\\', $this->userProviderModel()],
                $stub
            );
        }

        return $this;
    }
}
