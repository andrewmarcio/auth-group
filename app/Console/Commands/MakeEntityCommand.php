<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;

use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class MakeEntityCommand extends Command
{
    protected $name = 'make:entity';

    protected function rootNamespace()
    {
        return "Domain";
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        $basePath = is_dir(base_path('src/Domain')) ? 'src/Domain' : $this->laravel['path'] . '/';
        return $basePath . str_replace('\\', '/', $name) . '.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(base_path('src/Domain')) ? 'Domain' : $rootNamespace;
    }
}
