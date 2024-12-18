<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;

class MakeFilterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:filter {model} {column} {type=operator}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Filter Class';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile($path);

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->components->info(sprintf(ucfirst($this->argument('column')).'Filter [%s] created successfully.', $path));
        } else {
            $this->components->error(sprintf(ucfirst($this->argument('column')).'Filter [%s] already exists.', $path));
        }

    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        $filterType = $this->argument('type');
        if($filterType === 'operator') {
            return __DIR__ . '/../stubs/filter.operator.stub';
        } else if($filterType === 'like') {
            return __DIR__ . '/../stubs/filter.like.stub';
        } else {
            return __DIR__ . '/../stubs/filter.operator.stub';
        }
    }

    /**
    **
    * Map the stub variables present in stub to its value
    *
    * @return array
    *
    */
    public function getStubVariables()
    {
        return [
            'namespace' => 'App\\Filters\\'.$this->getSingularClassName($this->argument('model')).'Filters',
            'filter' => $this->getSingularClassName(Str::camel($this->argument('model'))),
            'variable' => $this->argument('column'),
            'class' => $this->getSingularClassName(Str::camel($this->argument('column'))),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;

    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path('App/Filters') .'/' .
                $this->getSingularClassName($this->argument('model')) . 'Filters' . '/' .
                $this->getSingularClassName(Str::camel($this->argument('column'))) . '.php';
    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0755, true);
        }

        return $path;
    }
}
