<?php namespace Bespokode\MembersModule\Http\Controller\Admin;

use Bespokode\MembersModule\Consumer\Form\ConsumerFormBuilder;
use Bespokode\MembersModule\Consumer\Table\ConsumerTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ConsumersController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ConsumerTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ConsumerTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ConsumerFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ConsumerFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ConsumerFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ConsumerFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
