<?php namespace Bespokode\VarietiesModule\Product;

use Bespokode\VarietiesModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ProductRepository extends EntryRepository implements ProductRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ProductModel
     */
    protected $model;

    /**
     * Create a new ProductRepository instance.
     *
     * @param ProductModel $model
     */
    public function __construct(ProductModel $model)
    {
        $this->model = $model;
    }
}
