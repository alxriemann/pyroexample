<?php namespace Bespokode\MembersModule\Association\Table;



/**
 * Class TypeTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AssociationTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(AssociationTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'back',
                'assignments' => [
                    'href' => '/members'
                ],
                'text' => 'back',
                'icon' => 'fa fa-eye',
                'type' => 'success',
            ]

        );
    }
}
