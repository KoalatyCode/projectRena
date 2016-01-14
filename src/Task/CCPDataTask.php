<?php

namespace ProjectRena\Task;

use Cilex\Command\Command;
use Exception;
use ProjectRena\Lib;
use ProjectRena\RenaApp;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CCPDataTask
 *
 * @package ProjectRena\Task
 */
class CCPDataTask extends Command
{
    /**
     *
     */
    protected function configure()
    {
        $this->setName('update:ccp')->setDescription('Updates the CCP database tables')
            ->addOption("force", "f", InputOption::VALUE_NONE, "Force Update");;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var RenaApp $app */
        $app = RenaApp::getInstance();

        // Setup the url and cache path
        $url = "https://www.fuzzwork.co.uk/dump/";
        $cache = __DIR__ . "/../../cache/update";

        // Create the cache dir if it doesn't exist
        if (!file_exists($cache)) mkdir($cache);

        // Fetch the md5
        $md5file = "mysql-latest.tar.bz2.md5";
        $md5 = explode(" ", $app->cURL->getData($url . $md5file, 0))[0];

        $lastSeenMD5 = $app->Storage->get("ccpdataMD5");

        if (($lastSeenMD5 !== $md5) || !$input->getOption("force") === false) {
            $output->writeln("Updating to latest CCP data dump");
            $dbFiles = array(
                "dgmAttributeCategories",
                "dgmAttributeTypes",
                "dgmEffects",
                "dgmTypeAttributes",
                "dgmTypeEffects",
                "invFlags",
                "invGroups",
                "invTypes",
                "mapDenormalize",
                "mapRegions",
                "mapSolarSystems",
                "mapConstellations",
            );
            $type = ".sql.bz2";

            foreach ($dbFiles as $file) {
                $output->writeln("Updating $file");
                $dataURL = $url . "latest/" . $file . $type;
                try {
                    file_put_contents("$cache/$file$type", $app->cURL->getData($dataURL, 0));
                    $sqlData = bzopen("$cache/$file$type", "r"); // Open the BZip data

                    // Read the BZip data and append it to data
                    $data = "";
                    while(!feof($sqlData))
                        $data .= bzread($sqlData, 4096);
                    
                } catch (\Exception $e) {
                    throw new \Exception($e->getMessage());
                }


                // Since rena uses tokuDB, we'll replace InnoDB with TokuDB here, just because we can..
                $data = str_replace("ENGINE=InnoDB", "ENGINE=TokuDB", $data);
                $dataParts = explode(";\n", $data);
                foreach ($dataParts as $qry) {
                    $query = $qry . ";";
                    $app->Db->execute($query);
                }

                // Remove the stored BZip file from the drive - no need to store it..
                unlink("{$cache}/{$file}.sql.bz2");
            }

            $app->Storage->set("ccpdataMD5", $md5);
        }
    }
}