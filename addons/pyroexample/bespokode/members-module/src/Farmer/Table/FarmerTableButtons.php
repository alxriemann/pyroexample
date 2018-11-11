<?php namespace Bespokode\MembersModule\Farmer\Table;

use Bespokode\MembersModule\Farmer\Table\FarmerTableBuilder;

/**
 * Class TypeTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FarmerTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(FarmerTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'assignments' => [
                    'href' => 'members/associations/profile/farmers/edit/{entry.id}'
                ],
            ]
        );
    }
}
