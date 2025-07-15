<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Services\File\FileRemove;
use App\Services\File\FileUpload;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    protected FileUpload $fileUpload;
    protected FileRemove $fileRemove;

    /**
     * @param FileUpload $fileUpload
     * @param FileRemove $fileRemove
     * @return void
    */
    public function __construct(FileUpload $fileUpload,
                                FileRemove $fileRemove)
    {
        $this->fileUpload = $fileUpload;
        $this->fileRemove = $fileRemove;
    }

    public function getExistingImagesById(array $images, $repository)
    {
        return $repository->getByIds(array_column($images, 'id'));
    }

    public function getExistingImages(array $images,
                                        string $key,
                                        string $modelId,
                                        $repository)
    {
        return $repository->getByParams([
            'order' => array_map(function ($image) {
                return $image['order'];
            }, $images),
            $key => $modelId
        ]);
    }

    public function deleteExistingImagesByParams(Collection $collection,
                                            string $destinationPath,
                                            string $key,
                                            $repository)
    {
        if($collection->isNotEmpty()){
            foreach ($collection as $value) {
                $this->fileRemove::deleteFile($value->file_path, $destinationPath);
                $repository->deleteByParams([
                            'order' => $value->order,
                            $key => data_get($value, $key)
                        ]);
            }
        }
    }

    public function deleteExistingImages(Collection $collection,
                                            string $destinationPath)
    {
        if(!empty($collection)){
            foreach ($collection as $value) {
                $filePath = "$destinationPath/{$value->file_path}";
                if ($value->file_path && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

    }

    public function deleteExistingImage(string $filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

    }

    public function prepareUpdateData(array $image,
                                         string $modelId,
                                         string $key,
                                         string $destinationPath)
    {
        return [
            'file_path' => $this->fileUpload::upload($modelId . $key, $image['file'], $destinationPath)
        ];
    }

    public function prepareInsertRows(array $images,
                                         string $modelId,
                                         string $key,
                                         string $destinationPath)
    {
        $insertRows = [];
        foreach ($images as $key2 => $value) {
            $insertRows[] = [
                'id' => Str::uuid()->toString(),
                'order' => $value['order'],
                $key => $modelId,
                'file_path' => $this->fileUpload::upload($modelId . $key2, $value['file'], $destinationPath)
            ];
        }
        return $insertRows;
    }

    public function prepareDeleteRows(array $images)
    {
        return array_map(fn($image) => ['id' => $image['id']], $images);
    }
}
