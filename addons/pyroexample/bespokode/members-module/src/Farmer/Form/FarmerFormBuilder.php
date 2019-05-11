<?php namespace Bespokode\MembersModule\Farmer\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Illuminate\Contracts\Auth\Guard;

class FarmerFormBuilder extends FormBuilder
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
    protected $actions = [];

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
    protected $sections = [];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];

    public function onSaving(Guard $auth)

    {
        $entry = $this->getFormEntry();

        if (!$entry->user_id) {
            $entry->user_id = $auth->id();
        }

    }

    public function onsaved(AssociationRepository $repository, Guard $auth)

    {
        $entry = $this->getFormEntry();
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if (!$entry->user_id) {
            abort(403);
        }
        if (!$countassociation == NULL) {

            return $this->setFormResponse(redirect('members/associations/farmers'));
        }
        return $this->setFormResponse(redirect('members/farmers'));


    }

}
