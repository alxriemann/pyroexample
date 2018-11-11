<?php namespace Bespokode\MembersModule\Http\Controller\Admin;

use Bespokode\MembersModule\Farmer\Form\FarmerFormBuilder;
use Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class FarmersController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param FarmerTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FarmerTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param FarmerFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FarmerFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param FarmerFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FarmerFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
