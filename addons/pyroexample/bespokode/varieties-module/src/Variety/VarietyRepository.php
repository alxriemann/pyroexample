<?php namespace Bespokode\VarietiesModule\Variety;

use Bespokode\VarietiesModule\Variety\Contract\VarietyRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class VarietyRepository extends EntryRepository implements VarietyRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var VarietyModel
     */
    protected $model;

    /**
     * Create a new VarietyRepository instance.
     *
     * @param VarietyModel $model
     */
    public function __construct(VarietyModel $model)
    {
        $this->model = $model;
    }
}
