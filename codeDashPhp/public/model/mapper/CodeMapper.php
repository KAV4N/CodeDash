<?php

require_once ROOT_PATH . "src/TupleLineCode.php";
require_once ROOT_PATH . "model/dto/CodeDto.php";

class CodeMapper {

    public function parseCodeSnippet($code) {
        $codeData = [];
        $lineNumbers = [];
        $lineCount = 1;
        $code = str_replace("\r\n", "\n", $code);

        while (!empty($code) && ($code[0] == '\n' || $code[0] == '\r')) {
            $code = substr($code, 1);
        }

        for ($i = 0; $i < strlen($code); $i++) {
            $character = substr($code, $i, 1);
            if ($character == "\n" || $character == "\r") {
                $character = "⏎";
                $lineNumbers[] = $lineCount++;
            } elseif ($character == " ") {
                $character = "space";
            }
            if ($i == strlen($code) - 1 && $character != "⏎") {
                $lineNumbers[] = $lineCount++;
            }

            $codeData[] = new CodeDto((string)$i, $character);
        }

        return new TupleLineCode($lineNumbers, $codeData);
    }
}