<?php namespace Bespokode\MembersModule\Crop\Table;

use Bespokode\MembersModule\Crop\Table\CropTableBuilder;

/**
 * Class TypeTableButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CropTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(CropTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'assignments' => [
                    'href' => 'members/associations/farmers/crops/edit/{entry.id}'
                ],
            ]
        );
    }
}
