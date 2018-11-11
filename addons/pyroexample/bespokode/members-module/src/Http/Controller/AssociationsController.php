<?php namespace Bespokode\MembersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Bespokode\MembersModule\Farmer\Form\FarmerFormBuilder;
use Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class AssociationsController
 *
 * @link
 * @author
 * @author        bespokode
 */
class AssociationsController extends PublicController
{
    /**
     * View a user profile.
     *
     * @param  UserRepositoryInterface $users
     * @return \Illuminate\Contracts\View\View|mixed
     */

    public function view_profile(UserRepositoryInterface $users, Guard $auth)

    {
        if (!$user = $users->find($auth->id())) {
            abort(404);
        }

        return $this->view->make('bespokode.module.members::associations/view', compact('user'));

    }
    public function edit_profile(UserFormBuilder $form, UserRepositoryInterface $users, Guard $auth)

    {
        $form
            ->skipField('username')
            ->skipField('email')
            ->skipField('activated')
            ->skipField('enabled')
            ->skipField('roles')
        ;
        $form
            ->getFormValue('display_name');

        return $form->render($users->find($auth->id()));
    }

    public function view_farmers(FarmerTableBuilder $builder)

    {
        $builder ->setButtons(          [
            'edit' => [
                'href' => 'members/associations/profile/farmers/edit/{entry.id}'
            ],
        ]);
        return $builder->render();
    }

    public function edit_farmers(FarmerFormBuilder $form, FarmerRepository $repository, Guard $auth, $id)

    {
        $myfarmers = $repository->all()->where('user_id', $auth->id()) ;
        $myownfarmers = $repository->getModel()->getOriginal('id', $myfarmers)->find($id);


        if  ( $myownfarmers ==  NULL) {

            abort(403);
        }

        $form
            ->skipField('user');

        return $form->render($id);
    }

    public function create_farmers(FarmerFormBuilder $builder, Guard $auth)

    {
        $builder->skipField('user');

        return $builder->render();

    }
}


/**
 * Created by Bespokode

 */