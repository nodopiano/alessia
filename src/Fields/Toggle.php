<?php

namespace Nodopiano\Alessia\Fields;

class Toggle extends Checkbox
{
    protected $type = 'toggle';
    protected $activeText = 'on';
    protected $inactiveText = 'off';

    public function activeText($text = 'on')
    {
        $this->activeText = $text;
        return $this;
    }

    public function inactiveText($text = 'off')
    {
        $this->inactiveText = $text;
        return $this;
    }

    public function meta()
    {
        return array_filter([
            'active_text' => $this->activeText,
            'inactive_text' => $this->inactiveText
        ]);
    }
}
