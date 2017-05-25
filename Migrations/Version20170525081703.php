<?php

namespace Mindy\Bundle\VacancyBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Mindy\Bundle\VacancyBundle\Model\Vacancy;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170525081703 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $vacancyTable = $schema->getTable(Vacancy::tableName());
        $vacancyTable->addColumn('content_short', 'text');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $vacancyTable = $schema->getTable(Vacancy::tableName());
        $vacancyTable->dropColumn('content_short');
    }
}
