<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Repository Class';

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
        $parentPath = $this->getParentSourceFilePath();

        $this->makeDirectory(dirname($parentPath));

        if (!$this->files->exists($parentPath)) {
            $contents = $this->getParentSourceFile();
            $this->files->put($parentPath, $contents);
            $this->components->info(sprintf('%s [%s] created successfully.', "BaseRepository", $parentPath));
        }

        $path = $this->getSourceFilePath();

        if (!$this->files->exists($path)) {
            $contents = $this->getSourceFile();
            $this->files->put($path, $contents);
            $this->components->info(sprintf('%s [%s] created successfully.', ucfirst($this->argument('name')). "Repository", $path));
        } else {
            $this->components->error(sprintf(ucfirst($this->argument('name')).'Repository [%s] already exists.', $path));
        }

    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . '/../stubs/repository.stub';
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getParentStubPath()
    {
        return __DIR__ . '/../stubs/repository.base.stub';
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
            'namespace' => 'App\\Repositories',
            'name' => $this->getSingularClassName($this->argument('name')),
            'variable' => lcfirst($this->argument('name')),
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
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getParentSourceFile()
    {
        return $this->getStubContents($this->getParentStubPath(), $this->getStubVariables());
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
        return base_path('App/Repositories') .'/' .$this->getSingularClassName($this->argument('name')) . 'Repository.php';
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getParentSourceFilePath()
    {
        return base_path('App/Repositories') .'/BaseRepository.php';
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
            $this->files->makeDirectory($path);
        }

        return $path;
    }

}
