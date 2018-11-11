<?php namespace Bespokode\MembersModule\Farmer;

use Bespokode\MembersModule\Farmer\Contract\FarmerRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class FarmerRepository extends EntryRepository implements FarmerRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var FarmerModel
     */
    protected $model;

    /**
     * Create a new FarmerRepository instance.
     *
     * @param FarmerModel $model
     */
    public function __construct(FarmerModel $model)
    {
        $this->model = $model;
    }
}
