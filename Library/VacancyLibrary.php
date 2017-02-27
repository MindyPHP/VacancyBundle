<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\VacancyBundle\Library;

use Mindy\Bundle\VacancyBundle\Model\Vacancy;
use Mindy\Template\Library;

class VacancyLibrary extends Library
{
    /**
     * @return array
     */
    public function getHelpers()
    {
        return [
            'get_vacancies' => function () {
                return Vacancy::objects()
                    ->published()
                    ->order(['-published_at'])
                    ->all();
            },
        ];
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return [];
    }
}
