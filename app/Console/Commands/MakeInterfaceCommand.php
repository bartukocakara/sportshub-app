<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;
use Illuminate\Filesystem\Filesystem;

class MakeInterfaceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
    */
    protected $signature = 'make:interface {name} {type=r}';

    /**
     * The console command description.
     *
     * @var string
    */
    protected $description = 'Make an Interface Class - arguments: r for Repo, s for Service';

    protected $shortRepository = 'r';
    protected $repository = 'repository';

    protected $shortService = 's';
    protected $service = 'service';

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
        $dynamics = $this->switchType();

        $parent_path = $this->getSourceFilePath().$dynamics['parent_interface'].'.php';
        $this->makeDirectory(dirname($parent_path));

        if (!$this->files->exists($parent_path)) {
            $contents = $this->getParentSourceFile($dynamics);
            $this->files->put($parent_path, $contents);
            $this->components->info(sprintf('%s [%s] created successfully.', $dynamics['parent_interface'], $parent_path));
        }

        $path = $this->getSourceFilePath().$this->getSingularClassName($this->argument('name')).$this->getSingularClassName($dynamics['subPath']).'Interface.php';

        if (!$this->files->exists($path)) {
            $contents = $this->getSourceFile($dynamics);
            $this->files->put($path, $contents);
            $this->components->info(sprintf('%s [%s] created successfully.', ucfirst($this->argument('name')).$this->getSingularClassName($dynamics['subPath'])."Interface", $path));
        } else {
            $this->components->error(sprintf(ucfirst($this->argument('name')).$this->getSingularClassName($dynamics['subPath']).'Interface [%s] already exists.', $path));
        }

    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath($stub_path)
    {
        return __DIR__ . $stub_path;
    }

    /**
    **
    * Map the stub variables present in stub to its value
    *
    * @return array
    *
    */
    public function getStubVariables($dynamics)
    {
        return [
            'name' => $this->getSingularClassName($this->argument('name')),
            'namespace' => 'App\\'.$dynamics['subPath'].'\\Interfaces',
            'class_name' => $this->getSingularClassName($this->argument('name')).$this->getSingularClassName($dynamics['subPath']).'Interface',
            'parent_interface' => $dynamics['parent_interface'],
            'comment' => $dynamics['comment'],
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile($dynamics)
    {
        return $this->getStubContents($this->getStubPath($dynamics['stub_path']), $this->getStubVariables($dynamics));
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getParentSourceFile($dynamics)
    {
        return $this->getStubContents($this->getStubPath($dynamics['parent_stub_path']), $this->getStubVariables($dynamics));
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        $dynamics = $this->switchType();
        return base_path('app/'.$dynamics['subPath'].'/Interfaces/');
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
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    protected function switchType()
    {
        switch ($this->argument('type')) {

            case $this->shortRepository:
            case $this->repository;
                $dynamics['subPath'] = "Repositories";
                $dynamics['stub_path'] = '/../stubs/interface.stub';
                $dynamics['parent_stub_path'] = '/../stubs/interface.repository.base.stub';
                $dynamics['parent_interface'] = "BaseRepositoryInterface";
                $dynamics['comment'] = "// Crud işlemleri gerekmiyorsa extends'i kaldırınız. //";
                break;

            case $this->shortService:
            case $this->service:
                $dynamics['subPath'] = "Services";
                $dynamics['stub_path'] = '/../stubs/interface.stub';
                $dynamics['parent_stub_path'] = '/../stubs/interface.service.crud.stub';
                $dynamics['parent_interface'] = "CrudServiceInterface";
                $dynamics['comment'] = "// Crud işlemleri gerekmiyorsa extends'i kaldırınız. //";

            default:
                break;
        }

        return $dynamics;
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
