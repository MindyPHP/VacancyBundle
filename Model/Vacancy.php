<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\VacancyBundle\Model;

use Mindy\Orm\Fields\BooleanField;
use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\DateTimeField;
use Mindy\Orm\Fields\TextField;
use Mindy\Orm\Model;

/**
 * Class Vacancy
 *
 * @property string $name
 * @property string $content
 * @property \DateTime $published_at
 * @property bool $is_published
 *
 * @method static \Mindy\Bundle\VacancyBundle\Model\VacancyManager objects($instance = null)
 */
class Vacancy extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
            ],
            'content' => [
                'class' => TextField::class,
            ],
            'is_published' => [
                'class' => BooleanField::class,
                'default' => true,
            ],
            'published_at' => [
                'class' => DateTimeField::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @param Vacancy $owner
     * @param bool $isNew
     */
    public function beforeSave($owner, $isNew)
    {
        if ($isNew) {
            $owner->published_at = $this->getAdapter()->getDateTime($this->published_at);
        }
    }
}
