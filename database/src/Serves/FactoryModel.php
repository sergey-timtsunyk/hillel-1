<?php

declare(strict_types=1);

namespace App\Serves;

use App\Model\ModelInterface;
use Doctrine\ActiveRecord\Dao\EntityDao;
use Doctrine\ActiveRecord\Dao\Factory;
use Doctrine\DBAL\DriverManager;

class FactoryModel
{
    /**
     * @param string $nameClass
     * @return ModelInterface|EntityDao
     * @throws \Doctrine\ActiveRecord\Exception\FactoryException
     * @throws \Doctrine\DBAL\DBALException
     */
    public static function getModel(string $nameClass): EntityDao
    {
        $connector = DriverManager::getConnection(['pdo' => ConnectDb::get()]);

        $daoFactory = new Factory($connector);

        $daoFactory->setFactoryNamespace('App\Model');
        $daoFactory->setFactoryPostfix('');

        return $daoFactory->create($nameClass);
    }
}
