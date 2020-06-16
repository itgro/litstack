<?php

namespace Fjord\Commands;

use Illuminate\Support\Str;

class FjordChart extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fjord:chart {name}
                            {--donut : Whether to create donut chart }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will create a chart config';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('donut')
            ? fjord_path('stubs/ChartDonutConfig.stub')
            : fjord_path('stubs/ChartAreaConfig.stub');
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getFjordPath() . '/' . str_replace('\\', '/', $name) . '.php';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Config\Charts';
    }

    /**
     * Parse the class name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        if (!Str::endsWith($name, 'Config')) {
            $name .= 'Config';
        }

        return parent::qualifyClass(ucfirst($name));
    }
}
