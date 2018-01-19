<?php namespace Bespokode\VarietiesModule\Http\Controller\Admin;

use Bespokode\VarietiesModule\Association\Form\AssociationFormBuilder;
use Bespokode\VarietiesModule\Association\Table\AssociationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class AssociationsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param AssociationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssociationTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param AssociationFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(AssociationFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param AssociationFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AssociationFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
