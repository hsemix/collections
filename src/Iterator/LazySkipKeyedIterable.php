<?php

namespace Collections\Iterator;

use Collections\KeyedIterable;

class LazySkipKeyedIterable implements KeyedIterable
{
    use LazyKeyedIterableTrait;

    /**
     * @var KeyedIterable
     */
    private $Enumerable;

    /**
     * @var int
     */
    private $n;

    public function __construct($Enumerable, $n)
    {
        $this->Enumerable = $Enumerable;
        $this->n = $n;
    }

    public function getIterator()
    {
        return new LazySkipKeyedIterator($this->Enumerable->getIterator(), $this->n);
    }
}
