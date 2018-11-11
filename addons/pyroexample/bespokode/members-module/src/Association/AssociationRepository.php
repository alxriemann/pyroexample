<?php namespace Bespokode\MembersModule\Association;

use Bespokode\MembersModule\Association\Contract\AssociationRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class AssociationRepository extends EntryRepository implements AssociationRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var AssociationModel
     */
    protected $model;

    /**
     * Create a new AssociationRepository instance.
     *
     * @param AssociationModel $model
     */
    public function __construct(AssociationModel $model)
    {
        $this->model = $model;
    }
}
