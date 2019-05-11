<?php namespace Bespokode\MembersModule\Association\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;

class AssociationTableBuilder extends TableBuilder
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
        'edit',

    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',

    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [

    ];

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
    public function onQuerying(Builder $query, Guard $auth)

    {
        if (($auth->id() == 1 ))
        {  return $query; }
        return $query->where('user_id', $auth->id());

    }


}
