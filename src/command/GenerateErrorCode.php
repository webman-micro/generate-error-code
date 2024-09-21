<?php

namespace app\command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;


class GenerateErrorCode extends Command
{
    protected static $defaultName = 'generate:error_code';
    protected static $defaultDescription = 'generate error_code';

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
        $errorCodeConfig = config('error_code');
        (new \teamones\responseCodeMsg\Generate($errorCodeConfig))->run();
        $output->writeln('generate:error_code');
        return self::SUCCESS;
    }

}
