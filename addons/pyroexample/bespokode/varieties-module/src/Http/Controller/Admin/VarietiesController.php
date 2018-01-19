<?php namespace Bespokode\VarietiesModule\Http\Controller\Admin;

use Bespokode\VarietiesModule\Variety\Form\VarietyFormBuilder;
use Bespokode\VarietiesModule\Variety\Table\VarietyTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class VarietiesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param VarietyTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(VarietyTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param VarietyFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(VarietyFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param VarietyFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(VarietyFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
