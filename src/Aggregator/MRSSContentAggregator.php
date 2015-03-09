<?php

namespace FastFeed\Aggregator;

use DOMElement;

use FastFeed\Item;

class MRSSContentAggregator extends AbstractAggregator implements AggregatorInterface
{
    /**
     * Execute the Aggregator
     *
     * @param DOMElement $node
     * @param Item       $item
     */
    public function process(DOMElement $node, Item $item)
    {
        $this->setMedia($node, $item);
    }

    /**
     *
     * @param DOMElement $node
     * @param Item       $item
     */
    protected function setMedia(DOMElement $node, Item $item)
    {
        $url = $this->getNodePropertyByTagNameNS($node, 'http://search.yahoo.com/mrss/', 'content', 'url');

        if ($url) {
            $item->setExtra('media_url', $url);
        }

        $title = $this->getNodeValueByTagNameNS($node, 'http://search.yahoo.com/mrss/', 'title');

        if ($title) {
            $item->setExtra('media_title', $title);
        }

        $description = $this->getNodeValueByTagNameNS($node, 'http://search.yahoo.com/mrss/', 'description');

        if ($description) {
            $item->setExtra('media_description', $description);
        }

    }
}
