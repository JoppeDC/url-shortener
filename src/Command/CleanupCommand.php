<?php

namespace App\Command;

use App\Service\CleanupService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:cleanup')]
class CleanupCommand extends Command
{
    public function __construct(
        private readonly CleanupService $cleanupService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $numberOfCleanedUrls = $this->cleanupService->cleanup();

        $output->writeln(sprintf("Cleaned %s URL's.", $numberOfCleanedUrls));

        return Command::SUCCESS;
    }
}
