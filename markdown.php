<?php
class MarkdownParser {
    private $markdown;

    public function __construct($markdown) {
        $this->markdown = $markdown;
    }

    public function parse() {
        $this->parseEmphasis();
        $this->parseStrong();
        $this->parseParagraphs();
        return $this->markdown;
    }

    private function parseEmphasis() {
        $this->markdown = preg_replace_callback('/(\*)(.*?)\1/', function ($matches) {
            return "<em>$matches[2]</em>";
        }, $this->markdown);
    }

    private function parseStrong() {
        $this->markdown = preg_replace_callback('/(__)(.*?)\1/', function ($matches) {
            return "<strong>$matches[2]</strong>";
        }, $this->markdown);
    }

    private function parseParagraphs() {
        $paragraphs = preg_split('/\n{2,}/', $this->markdown);
        $parsedParagraphs = array_map(function ($paragraph) {
            return "<p>$paragraph</p>";
        }, $paragraphs);
        $this->markdown = implode('', $parsedParagraphs);
    }
}

// Example usage
$markdown = "*This is* some __markdown__.\n\nAnd another paragraph.";
$parser = new MarkdownParser($markdown);
$html = $parser->parse();
echo $html;
