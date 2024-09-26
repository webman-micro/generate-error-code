<?php

namespace WebmanMicro\GenerateErrorCode\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateErrorCode extends Command
{
    protected static $defaultName = 'generate:error_code';
    protected static $defaultDescription = 'generate error_code and error msg';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Name description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $errorCodeConfig = config('plugin.webman-micro.generate-error-code.app');
        (new \WebmanMicro\GenerateErrorCode\Generate($errorCodeConfig))->run();
        $output->writeln('generate:error_code');
        return self::SUCCESS;
    }

}
