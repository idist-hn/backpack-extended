<?php

namespace Novius\Backpack\CRUD\Observers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Model;
use Novius\Backpack\CRUD\Services\UploadImageService;

class UploadImageObserver
{

    /**
     * @var \Cviebrock\EloquentSluggable\Services\SlugService
     */
    private $imageUploadService;

    /**
     * UploadImageObserver constructor.
     * @param UploadImageService $imageUploadService
     */
    public function __construct(UploadImageService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    /**
     * @param Model $model
     */
    public function saving(Model $model)
    {
        $this->imageUploadService->fillImages($model);
    }

    /**
     * @param Model $model
     */
    public function saved(Model $model)
    {
        $this->imageUploadService->saveImages($model);
    }

    /**
     * @param Model $model
     */
    public function deleting(Model $model)
    {
        $this->imageUploadService->deleteImages($model);
    }

}
