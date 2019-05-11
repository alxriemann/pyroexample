<?php namespace Bespokode\MembersModule\Crop\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Bespokode\VarietiesModule\Variety\VarietyRepository;
use Bespokode\VarietiesModule\Product\ProductRepository;
use ClassesWithParents\F;
use Illuminate\Contracts\Auth\Guard;

class CropFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = ['save'];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'first' => [
            'fields' => [
                'code',
                'farmer',
                'products',
                'growing_area',
                'sowing_date',
                'estimated_harvest_starts_at',
                'estimated_harvest_ends_at',
                'estimated_yield',
                'harvest_started_at',
                'harvest_ended_at',
                'yield'
            ],
        ],
        'second' => [

            'view' => 'bespokode.module.members::associations/section'
        ],

    ];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];


     public function onSaving(FarmerRepository $repository, VarietyRepository $varietyRepository, ProductRepository $productRepository, CropFormBuilder $builder, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $entry = $this->getFormEntry();
        $farmer = $repository->findBy('user_id', $auth->id())->getId();
        $farmername = $repository->findBy('user_id', $auth->id())->getOriginal('slug');
        $cropvarietyid = $builder->getFormValue('varieties');
        $cropvarietyname = $varietyRepository->findBy('varieties_varieties.id', $cropvarietyid)->getOriginal('slug');
        $cropvarietyproductid = $varietyRepository->findBy('varieties_varieties.id', $cropvarietyid)->getOriginal('products_id');
        $cropvarietyproduct = $productRepository->findBy('varieties_products.id', $cropvarietyproductid)->getOriginal('slug');
        $time = $this->getFormEntry()->freshTimestamp();
        $code = $cropvarietyproduct.'-'.$cropvarietyname.'-'.$farmername.'-'.$time;
        $cropcode = $this->setFormValue('code',$code);

        if (!$entry->farmer_id) {
            $entry->farmer_id = $farmer;
        }
        if (!$entry->user_id) {
            $entry->user_id = $auth->id();
        }
        if (!$entry->code) {
            $entry->code = $cropcode;
        }

    }

    public function onsaved(AssociationRepository $repository,FarmerRepository $farmerRepository, VarietyRepository $varietyRepository, ProductRepository $productRepository, CropFormBuilder $builder, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $entry = $this->getFormEntry();
        $farmer = $farmerRepository->findBy('user_id', $auth->id())->getId();
        $farmername = $farmerRepository->findBy('user_id', $auth->id())->getOriginal('slug');
        $cropvarietyid = $builder->getFormValue('varieties');
        $cropvarietyname = $varietyRepository->findBy('varieties_varieties.id', $cropvarietyid)->getOriginal('slug');
        $cropvarietyproductid = $varietyRepository->findBy('varieties_varieties.id', $cropvarietyid)->getOriginal('products_id');
        $cropvarietyproduct = $productRepository->findBy('varieties_products.id', $cropvarietyproductid)->getOriginal('slug');
        $time = $this->getFormEntry()->freshTimestamp();
        $code = $cropvarietyproduct.'-'.$cropvarietyname.'-'.$farmername.'-'.$time;
        $cropcode = $this->setFormValue('code',$code);

        if (!$entry->farmer_id) {
            $entry->farmer_id = $farmer;
        }
        if (!$entry->user_id) {
            $entry->user_id = $auth->id();
        }
        if (!$entry->code) {
            $entry->code = $cropcode;
        }
        $entry = $this->getFormEntry();
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if (!$entry->user_id) {
            abort(403);
        }
        if (!$countassociation == NULL) {

            return $this->setFormResponse(redirect('members/associations/crops'));
        }
        return $this->setFormResponse(redirect('members/farmers/crops'));


    }

}
