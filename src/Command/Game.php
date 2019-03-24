<?php

namespace Sbarbat\Chip\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Sbarbat\Chip\Characters\Hive\HiveFactory;
use Sbarbat\Chip\Characters\QueenInterface;

/**
 * Game class for Chip Financial PHP test.
 *
 * @author Santiago Barbat<brabatsan@gmail.com>
 */
class Game extends Command
{
    /**
     * Configure the command.
     */
    protected function configure()
    {
        $this->setName('game:start')
            ->setDescription('Bee game!');
    }

    /**
     * Command action.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $hits = 0;
        $helper = $this->getHelper('question');
        $question = new Question('', '');

        $factory = new HiveFactory();
        $hive = $factory->new();

        while ($hive->hasAliveBees()) {
            if ('hit' === $helper->ask($input, $output, $question)) {
                $bee = $hive->pickBee();
                $output->writeln($bee->hit());

                if (!$bee->getCanFly() && $bee instanceof QueenInterface) {
                    $hive->killAll();
                    break;
                }
                ++$hits;
            }
        }

        $output->writeln(sprintf('Hive destroyed in %s hits', $hits));
    }
}
