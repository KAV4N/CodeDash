<?php
class TupleLineCode {
    public $lineNumbers;
    public $codeSnippet;

    public function __construct($lineNumbers, $codeSnippet) {
        $this->lineNumbers = $lineNumbers;
        $this->codeSnippet = $codeSnippet;
    }
}