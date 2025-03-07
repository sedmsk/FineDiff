<?php

namespace FineDiffTests\Usage;

use CogPowered\FineDiff\Diff;
use CogPowered\FineDiff\Granularity\GranularityInterface;
use CogPowered\FineDiff\Render\Text;
use CogPowered\FineDiff\Render\Html;
use CogPowered\FineDiff\Granularity\Character;
use CogPowered\FineDiff\Granularity\Word;
use CogPowered\FineDiff\Granularity\Sentence;
use CogPowered\FineDiff\Granularity\Paragraph;

class SeparateSimpleTest extends Base
{
    protected static function createDiff(GranularityInterface $granularity)
    {
        return new Diff($granularity, null, null, true);
    }

    public function testInsertCharacterGranularity()
    {
        list($from, $to, $operation_codes, $html) = $this->getFile('character/simple');

        $diff = self::createDiff(new Character);
        $generated_operation_codes = $diff->getOperationCodes($from, $to);


        // Generate operation codes
        $this->assertEquals($generated_operation_codes, $operation_codes);

        // Render to text from operation codes
        $render = new Text;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $to );

        // Render to html from operation codes
        $render = new Html;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $html );

        // Render
        $this->assertEquals( $diff->render($from, $to), $html );
    }

    public function testInsertWordGranularity()
    {
        list($from, $to, $operation_codes, $html) = $this->getFile('word/separate/simple');

        $diff = self::createDiff(new Word);
        $generated_operation_codes = $diff->getOperationCodes($from, $to);


        // Generate operation codes
        $this->assertEquals($generated_operation_codes, $operation_codes);

        // Render to text from operation codes
        $render = new Text;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $to );

        // Render to html from operation codes
        $render = new Html;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $html );

        // Render
        $this->assertEquals( $diff->render($from, $to), $html );
    }

    public function testInsertSentenceGranularity()
    {
        list($from, $to, $operation_codes, $html) = $this->getFile('sentence/separate/simple');

        $diff = self::createDiff(new Sentence);
        $generated_operation_codes = $diff->getOperationCodes($from, $to);


        // Generate operation codes
        $this->assertEquals($generated_operation_codes, $operation_codes);

        // Render to text from operation codes
        $render = new Text;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $to );

        // Render to html from operation codes
        $render = new Html;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $html );

        // Render
        $this->assertEquals( $diff->render($from, $to), $html );
    }

    public function testInsertParagraphGranularity()
    {
        list($from, $to, $operation_codes, $html) = $this->getFile('paragraph/separate/simple');

        $diff = self::createDiff(new Paragraph);
        $generated_operation_codes = $diff->getOperationCodes($from, $to);


        // Generate operation codes
        $this->assertEquals($generated_operation_codes, $operation_codes);

        // Render to text from operation codes
        $render = new Text;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $to );

        // Render to html from operation codes
        $render = new Html;
        $this->assertEquals( $render->process($from, $generated_operation_codes), $html );

        // Render
        $this->assertEquals( $diff->render($from, $to), $html );
    }
}
