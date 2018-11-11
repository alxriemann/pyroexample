<?php namespace Bespokode\MembersModule\Http\Controller\Admin;

use Bespokode\MembersModule\Member\Form\MemberFormBuilder;
use Bespokode\MembersModule\Member\Table\MemberTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class MembersController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param MemberTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(MemberTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param MemberFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(MemberFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param MemberFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(MemberFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
