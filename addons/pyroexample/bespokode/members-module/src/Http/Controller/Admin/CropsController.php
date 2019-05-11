<?php namespace Bespokode\MembersModule\Http\Controller\Admin;

use Bespokode\MembersModule\Crop\Form\CropFormBuilder;
use Bespokode\MembersModule\Crop\Table\CropTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class CropsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param CropTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CropTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param CropFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CropFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param CropFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CropFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
