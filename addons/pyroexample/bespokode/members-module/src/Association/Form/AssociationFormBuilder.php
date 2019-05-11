<?php namespace Bespokode\MembersModule\Association\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Auth\Guard;

class AssociationFormBuilder extends FormBuilder
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
    public function onsaved()

    {
        return $this->setFormResponse(redirect('members/associations'));
    }
}
