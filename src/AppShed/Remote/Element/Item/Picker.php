<?php
namespace AppShed\Remote\Element\Item;

class Picker extends Item implements FormVariable
{
    use FormItem;

    const TYPE_DATE = 'date';
    const TYPE_TIME = 'time';

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var string
     */
    protected $placeHolder;

    /**
     *
     * @var \DateTime
     */
    protected $value;

    /**
     *
     * @var string
     */
    protected $title;

    public function __construct($variableName, $type, $title)
    {
        parent::__construct();
        $this->variableName = $variableName;
        $this->type = $type;
        $this->title = $title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPlaceHolder()
    {
        return $this->placeHolder;
    }

    public function setPlaceHolder($placeHolder)
    {
        $this->placeHolder = $placeHolder;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue(\DateTime $value)
    {
        $this->value = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    protected function getClass()
    {
        return parent::getClass() . " textbox picker $this->type";
    }

    /**
     * Get the html node for this element
     *
     * @param \DOMElement $node
     * @param \AppShed\Remote\XML\DOMDocument $xml
     * @param \AppShed\Remote\HTML\Settings $settings
     */
    protected function getHTMLNodeInner($node, $xml, $settings)
    {
        if (!empty($this->title)) {
            $node->appendChild($xml->createElement('div', ['class' => 'title', 'text' => $this->title]));
        }
        $node->appendChild(
            $inner = $xml->createElement('div', 'textbox-container' . (empty($this->title) ? ' no-title' : ''))
        );
        $inner->appendChild(
            $xml->createElement(
                'span',
                [
                    'class' => 'picked',
                    'data-value' => $this->value ? ($this->type == static::TYPE_DATE ? $this->value->getTimestamp(
                        ) : $this->value->format('H:i')) : null,
                    'data-placeholder' => $this->placeHolder,
                    'data-variable' => $this->variableName,
                    'data-picker-type' => $this->type,
                    'data-save-value' => $this->save
                ]
            )
        );
    }
}
