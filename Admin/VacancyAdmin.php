<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\VacancyBundle\Admin;

use Mindy\Bundle\AdminBundle\Admin\AbstractModelAdmin;
use Mindy\Bundle\VacancyBundle\Form\VacancyForm;
use Mindy\Bundle\VacancyBundle\Model\Vacancy;

class VacancyAdmin extends AbstractModelAdmin
{
    public $columns = ['name', 'is_published', 'published_at'];

    public function getFormType()
    {
        return VacancyForm::class;
    }

    public function getModelClass()
    {
        return Vacancy::class;
    }
}
