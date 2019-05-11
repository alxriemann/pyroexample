<?php namespace Bespokode\MembersModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Consumer\Form\ConsumerFormBuilder;
use Bespokode\MembersModule\Consumer\Table\ConsumerTableBuilder;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Bespokode\MembersModule\Consumer\ConsumerRepository;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class FarmersController
 *
 * @link
 * @author
 * @author        bespokode
 */
class ConsumersController extends PublicController
{

    public function view_consumer_profile(ConsumerTableBuilder $builder)

    {
        $builder ->setButtons(          [
            'edit' => [
                'href' => 'members/consumers/edit/{entry.id}'
            ],
        ]);
        return $builder->render();
    }

    public function edit_consumer_profile(ConsumerFormBuilder $form, ConsumerRepository $repository, Guard $auth, $id)

    {
        $myconsumers = $repository->all()->where('user_id', $auth->id()) ;
        $myownconsumer = $repository->getModel()->getOriginal('id', $myconsumers)->find($id);


        if  ( $myownconsumer ==  NULL) {

            abort(403);
        }

        $form
            ->skipField('user');

        return $form->render($id);
    }

    public function create_consumer_profile(ConsumerFormBuilder $builder, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $myownassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $myownfarmer = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $myownconsumer = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if (!$user = $auth->user())
        {
            abort(403);
        };
        if (!$myownassociation == NULL)
        {
            abort(403);
        };
        if (!$myownfarmer == NULL)
        {
            abort(403);
        };
        if (!$myownconsumer == NULL)
        {
            abort(403);
        };

        $builder->skipField('user');

        return $builder->render();

    }
}


/**
 * Created by Bespokode

 */