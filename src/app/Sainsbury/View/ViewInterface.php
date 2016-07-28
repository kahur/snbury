<?php

namespace Sainsbury\View;


/**
 *
 * @author Kamil Hurajt
 */
interface ViewInterface 
{
    /**
     * @return \Sainsbury\View\Output\OutputInterface
     */
    public function getOutput();
    public function render();
    public function setContent($content);
}
