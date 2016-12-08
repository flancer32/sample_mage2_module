<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Own
    extends \Symfony\Component\Console\Command\Command
{
    /** @var \Magento\Quote\Api\CartManagementInterface */
    protected $cartManagement;

    public function __construct(
        \Magento\Quote\Api\CartManagementInterface $cartManagement
    ) {
        parent::__construct('sample:command');
        $this->cartManagement = $cartManagement;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("I'm a sample.");
    }

}