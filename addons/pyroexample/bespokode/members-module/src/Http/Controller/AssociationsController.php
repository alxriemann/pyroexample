<?php namespace Bespokode\MembersModule\Http\Controller;

use Anomaly\RelationshipFieldType\RelationshipFieldType;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\UserRepository;
use Bespokode\MembersModule\Association\AssociationRepository;
use Bespokode\MembersModule\Association\Form\AssociationFormBuilder;
use Bespokode\MembersModule\Association\Table\AssociationTableBuilder;
use Bespokode\MembersModule\Crop\Form\CropFormBuilder;
use Bespokode\MembersModule\Farmer\Form\FarmerFormBuilder;
use Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder;
use Bespokode\MembersModule\Crop\Table\CropTableBuilder;
use Bespokode\MembersModule\Farmer\FarmerRepository;
use Bespokode\MembersModule\Farmer\Contract\FarmerRepositoryInterface;
use Bespokode\MembersModule\Crop\CropRepository;
use Bespokode\MembersModule\Consumer\ConsumerRepository;
use Bespokode\VarietiesModule\Variety\VarietyRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class AssociationsController
 *
 * @link
 * @author
 * @author        bespokode
 */
class AssociationsController extends PublicController
{

    public function view_association(AssociationTableBuilder $builder, AssociationRepository $repository, FarmerRepository $farmerRepository,Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if( $countmyassociation == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::home'));
        };

        $builder ->setButtons(          [
            'edit' => [
                'href' => 'members/associations/edit/{entry.id}'
            ],
        ]);
        return $builder->render();
    }
    public function edit_association(AssociationFormBuilder $form, AssociationRepository $repository, Guard $auth, $id)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $myownassociation = $repository->getModel()->getOriginal('id', $myassociation)->find($id);

        if( $myownassociation == NULL ) {
            abort(403);
        };

        $form
            ->skipField('user');

        return $form->render($id);
    }
    public function create_association(AssociationFormBuilder $builder, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $countmyfarmers = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $countmyconsumers = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if( !$countmyassociation == NULL ) {

            return $this->redirect->to(route('bespokode.module.members::associations.farmers'));
        };
        if (!$countmyfarmers == NULL)
        {
            return $this->redirect->to(route('bespokode.module.members::farmers.view'));
        };
        if (!$countmyconsumers == NULL)
        {
            return $this->redirect->to(route('bespokode.module.members::consumers.view'));
        };

        $builder
            ->skipField('user');
        return $builder->render();


    }

    public function view_farmers(FarmerTableBuilder $builder, FarmerRepository $farmerRepository, AssociationRepository $repository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if( $countmyassociation == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::home'));
        };
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $countmyfarmers = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();

        if( $countmyfarmers == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::associations.farmers_create'));
        };
        $builder ->setButtons(          [
            'edit' => [
                'href' => 'members/associations/farmers/edit/{entry.id}'
            ],
        ]);
        return $builder->render();
    }

    public function edit_farmers(FarmerFormBuilder $form, FarmerRepository $repository, Guard $auth, $id)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myfarmers = $repository->all()->where('user_id', $auth->id()) ;
        $myownfarmers = $repository->getModel()->getOriginal('id', $myfarmers)->find($id);


        if  ( $myownfarmers ==  NULL) {

            abort(403);
        }

        $form
            ->skipField('association')
            ->skipField('user');

        return $form->render($id);
    }

    public function create_farmers(FarmerFormBuilder $builder, AssociationRepository $repository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();

        if ( $countmyassociation == NULL ) {

            abort(403);
        };
        $thisassociation = $repository->findBy('user_id', $auth->id())->getId();

        $fields = $builder->getFields();
        $fields['name']['config']['default_value'] = null;
        $fields['slug']['config']['default_value'] = null;
        $fields['description']['config']['default_value'] = null;
        $fields['association']['config']['default_value'] = $thisassociation;
        $fields['user']['config']['default_value'] = $auth->id();
        $fields['telephone_number']['config']['default_value'] = null;
        $fields['cultivated_area']['config']['default_value'] = null;
        $fields['sheltered_area']['config']['default_value'] = null;
        $builder->setFields($fields);
        $builder->skipField('association');
        $builder->skipField('user');

        return $builder->render();

    }
    public function view_crops(CropTableBuilder $cropTableBuilder, CropRepository $repository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };

        $mycropsids = $repository->all()->where('user_id', $auth->id());
        $countmycrops = $repository->getModel()->getOriginal('id', $mycropsids)->count();

        if( $countmycrops == NULL ) {
            return $this->redirect->to(route('bespokode.module.members::associations.crops_create'));
        };

        $cropTableBuilder->setButtons(          [

            'edit' => [
                'href' => 'members/associations/crops/edit/{entry.id}'
            ],
        ]);

        return $cropTableBuilder->render();

    }
    public function edit_crops(CropFormBuilder $form, CropRepository $repository, Guard $auth, $id)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };
        $mycropsids = $repository->all()->where('user_id', $auth->id());
        $currentcropid = $repository->getModel()->getOriginal('id', $mycropsids)->find($id);

        if  ( $currentcropid ==  NULL) {

            abort(403);
        }



        return $form->render($id);
    }
    public function create_crops(CropFormBuilder $form, AssociationRepository $repository, FarmerRepository $farmerRepository, ConsumerRepository $consumerRepository, Guard $auth)

    {
        if (!$user = $auth->user())
        {
            abort(403);
        };

        $myassociation = $repository->all()->where('user_id', $auth->id()) ;
        $countmyassociation = $repository->getModel()->getOriginal('id', $myassociation)->count();
        $myfarmers = $farmerRepository->all()->where('user_id', $auth->id()) ;
        $countmyfarmers = $farmerRepository->getModel()->getOriginal('id', $myfarmers)->count();
        $myconsumers = $consumerRepository->all()->where('user_id', $auth->id()) ;
        $countmyconsumers = $consumerRepository->getModel()->getOriginal('id', $myconsumers)->count();

        if ( $countmyassociation == NULL ) {

            abort(403);
        };

        if (!$countmyconsumers == NULL)
        {
            abort(403);
        };

        $form->skipField('user');

        return $form->render();

    }
}


/**
 * Created by Bespokode

 */