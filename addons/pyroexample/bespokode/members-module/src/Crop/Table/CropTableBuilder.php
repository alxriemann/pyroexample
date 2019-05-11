<?php namespace Bespokode\MembersModule\Crop\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Bespokode\MembersModule\Crop\CropRouter;
use Bespokode\MembersModule\Http\Controller\AssociationsController;
use Bespokode\MembersModule\Farmer\FarmerModel;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;

class CropTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

    /**
     * Fired just before querying
     * for table entries.
     *
     * @param Builder $query
     *
     */
    public function onQuerying(Builder $query, FarmerRepository $repository, Guard $auth)

    {
        if (($auth->id() == 1 ))
        {  return $query; }
        return $query->where('user_id', $auth->id());
    }


}
