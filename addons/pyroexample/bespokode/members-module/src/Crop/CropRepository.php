<?php namespace Bespokode\MembersModule\Crop;

use Bespokode\MembersModule\Crop\Contract\CropRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class CropRepository extends EntryRepository implements CropRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CropModel
     */
    protected $model;

    /**
     * Create a new CropRepository instance.
     *
     * @param CropModel $model
     */
    public function __construct(CropModel $model)
    {
        $this->model = $model;
    }
}
