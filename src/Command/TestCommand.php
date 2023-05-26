<?php

namespace App\Command;

use App\Service\ValidationApiService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'test',
    description: 'Add a short description for your command',
)]
class TestCommand extends Command
{
    protected $vaps;
    public function __construct(ValidationApiService $vaps){
        parent::__construct();
        $this->vaps = $vaps;
    }
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('un argument : %s', $arg1));
        }

        // if ($input->getOption('option 1')) {
        //     // ...
        // }

        $io->note(sprintf(' on appelle check_wrCandidat ', $arg1));
        $answer=$this->vaps -> check_wrCandidat();

        if (!$answer ){
            $io->note(sprintf(' Voir le fichier du log: '.$this->vaps->getTempFile(), $arg1));
            return Command::FAILURE;
        }
        $io->success('la operation a reussi! ');
        return Command::SUCCESS;
    }


}
