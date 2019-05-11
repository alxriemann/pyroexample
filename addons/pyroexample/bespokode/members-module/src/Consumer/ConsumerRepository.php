<?php namespace Bespokode\MembersModule\Consumer;

use Bespokode\MembersModule\Consumer\Contract\ConsumerRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ConsumerRepository extends EntryRepository implements ConsumerRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ConsumerModel
     */
    protected $model;

    /**
     * Create a new ConsumerRepository instance.
     *
     * @param ConsumerModel $model
     */
    public function __construct(ConsumerModel $model)
    {
        $this->model = $model;
    }
}
