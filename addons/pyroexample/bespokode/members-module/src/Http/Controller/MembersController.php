<?php namespace Bespokode\MembersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Bespokode\MembersModule\Crop\CropRepository;
use Bespokode\MembersModule\Consumer\ConsumerRepository;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class MembersController
 *
 * @link
 * @author
 * @author        bespokode
 */
class MembersController extends PublicController
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

        return $this->view->make('bespokode.module.members::view', compact('user'));

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
    public function home(UserRepositoryInterface $users, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $myownassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $myownfarmer = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $myownconsumer = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if (!$user = $users->find($auth->id())) {
            abort(403);
        }
        if (!$myownassociation == NULL)
        {
            return $this->view->make('bespokode.module.members::AssociationHome');
        };
        if (!$myownfarmer == NULL)
        {
            return $this->view->make('bespokode.module.members::FarmerHome');
        };
        if (!$myownconsumer == NULL)
        {
            return $this->view->make('bespokode.module.members::ConsumerHome');
        };

        return $this->view->make('bespokode.module.members::home');

    }

}


/**
 * Created by Bespokode

 */