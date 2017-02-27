<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\VacancyBundle\SitemapProvider;

use Mindy\Bundle\VacancyBundle\Model\Vacancy;
use Mindy\Sitemap\AbstractSitemapProvider;
use Mindy\Sitemap\Entity\LocationEntity;

class VacancySitemapProvider extends AbstractSitemapProvider
{
    /**
     * {@inheritdoc}
     */
    public function build($scheme, $host)
    {
        foreach (Vacancy::objects()->asArray()->batch(100) as $chunk) {
            foreach ($chunk as $object) {
                yield (new LocationEntity())
                    ->setLastmod(new \DateTime($object['published_at']))
                    ->setLocation($this->generateLoc($scheme, $host, 'vacancy_view', [
                        'id' => $object['id'],
                    ]));
            }
        }
    }
}
