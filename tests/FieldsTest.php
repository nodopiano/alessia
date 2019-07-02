<?php
use PHPUnit\Framework\TestCase;

use Nodopiano\Alessia\Fields\Text;
use Nodopiano\Alessia\Fields\Date;
use Nodopiano\Alessia\Fields\Hidden;
use Nodopiano\Alessia\Fields\Number;
use Nodopiano\Alessia\Fields\Double;

final class FieldsTest extends TestCase
{
    public function testTextField(): void
    {
        $this->assertInstanceOf(
            Text::class,
            Text::make('name')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'text',
                'sortable' => false,
                'label' => false,
                'readonly' => false,
                'required' => false,
                'traverse' => 'name', 
                'placeholder' => false,
                ]),
            json_encode(Text::make('name'))
        );
    }

    public function testHiddenField(): void
    {
        $this->assertInstanceOf(
            Hidden::class,
            Hidden::make('name')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'hidden',
                'sortable' => false,
                'label' => false,
                'readonly' => false,
                'required' => false,
                'traverse' => 'name', 
                'placeholder' => false,
                ]),
            json_encode(Hidden::make('name'))
        );
    }

    public function testNumberField(): void
    {
        $this->assertInstanceOf(
            Number::class,
            Number::make('age')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'number',
                'sortable' => false,
                'label' => false,
                'readonly' => false,
                'required' => false,
                'traverse' => 'age', 
                'placeholder' => false,
                'append' => 'anni'
                ]),
            json_encode(Number::make('age')->append('anni'))
        );
    }

    public function testDoubleField(): void
    {
        $this->assertInstanceOf(
            Double::class,
            Double::make('weight')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'double',
                'sortable' => false,
                'label' => false,
                'readonly' => false,
                'required' => false,
                'traverse' => 'weight', 
                'placeholder' => false,
                'precision' => 0.1
                ]),
            json_encode(Double::make('weight')->precision(0.1))
        );
    }

    public function testTextFlagField(): void
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'text',
                'sortable' => true,
                'label' => 'Name',
                'readonly' => false,
                'required' => true,
                'traverse' => 'name', 
                'placeholder' => 'Name',
                'append' => 'Mr',
                ]),
            json_encode(Text::make('name')->sortable()->append('Mr')->readonly(false)->required(true)->gate(true)->placeholder('Name')->label('Name'))
        );
    } 


    public function testDateField(): void
    {
        $this->assertInstanceOf(
            Date::class,
            Date::make('start')
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode([
                'type' => 'date',
                'sortable' => false,
                'label' => false,
                'readonly' => false,
                'required' => false,
                'traverse' => 'start', 
                'placeholder' => false,
                'format' => 'd/m/Y'
                ]),
            json_encode(Date::make('start')->format('d/m/Y'))
        );
    }
}