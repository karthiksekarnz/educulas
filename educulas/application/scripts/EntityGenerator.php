<?php
use Doctrine\ORM\Tools\EntityGenerator;
ini_set("display_errors", "On");
$libPath =  realpath(dirname(__FILE__) . '/../library'); // Set this to where you have doctrine2 installed
// autoloaders

require_once $libPath . '/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', $libPath);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entity', $libPath.'/Campus/Entity');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxy',$libPath.'/Campus/Entity/Proxy');
$classLoader->register();

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver($libPath.'/Campus/Entity'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir($libPath.'/Campus/Entity/Proxy');
$config->setProxyNamespace('Campus\Entity\Proxy');


$connectionParams = array(
    'driver' => 'pdo_mysql',
    'host' => 'localhost',
    'port' => '3306',
    'user' => 'root',
    'password' => 'intellinux',
    'dbname' => 'zendb',
    'charset' => 'utf8',
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $em->getConnection()->getSchemaManager()
);
$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em);
$classes = $driver->getAllClassNames();
$metadata = $cmf->getAllMetadata();
$generator = new EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, $libPath.'/Campus/Entity');
print 'Done!';
?>