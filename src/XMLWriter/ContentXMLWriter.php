<?php

namespace FlySkyPie\RegulationODText\XMLWriter;

use FlySkyPie\RegulationODText\XMLWriter\XMLWriter;
use FlySkyPie\RegulationODText\Loader\RegulationLoaderInterface;

/**
 * Description of ContentXMLWriter
 *
 * @author flyskypie
 */
class ContentXMLWriter extends XMLWriter {

  public function __construct(RegulationLoaderInterface $loader) {
    parent::__construct();

    $rootElement = $this->createRootElement();
    $loader->addRegulationTo($rootElement);
  }

  /**
   * Declared specification version and XML namespaces,
   * create root element and return root of text element.
   */
  private function createRootElement(): \DOMElement {
    $attribute = [
        'office:version' => '1.2',
        'xmlns:office' => 'urn:oasis:names:tc:opendocument:xmlns:office:1.0',
        'xmlns:style' => 'urn:oasis:names:tc:opendocument:xmlns:style:1.0',
        'xmlns:text' => 'urn:oasis:names:tc:opendocument:xmlns:text:1.0',
        'xmlns:table' => 'urn:oasis:names:tc:opendocument:xmlns:table:1.0',
        'xmlns:draw' => 'urn:oasis:names:tc:opendocument:xmlns:drawing:1.0',
        'xmlns:fo' => 'urn:oasis:names:tc:opendocument:xmlns:xsl-fo-compatible:1.0',
        'xmlns:xlink' => 'http://www.w3.org/1999/xlink',
        'xmlns:dc' => 'http://purl.org/dc/elements/1.1/',
        'xmlns:meta' => 'urn:oasis:names:tc:opendocument:xmlns:meta:1.0',
        'xmlns:number' => 'urn:oasis:names:tc:opendocument:xmlns:datastyle:1.0',
        'xmlns:svg' => 'urn:oasis:names:tc:opendocument:xmlns:svg-compatible:1.0',
        'xmlns:chart' => 'urn:oasis:names:tc:opendocument:xmlns:chart:1.0',
        'xmlns:dr3d' => 'urn:oasis:names:tc:opendocument:xmlns:dr3d:1.0',
        'xmlns:math' => 'http://www.w3.org/1998/Math/MathML',
        'xmlns:form' => 'urn:oasis:names:tc:opendocument:xmlns:form:1.0',
        'xmlns:script' => 'urn:oasis:names:tc:opendocument:xmlns:script:1.0',
        'xmlns:ooo' => 'http://openoffice.org/2004/office',
        'xmlns:ooow' => 'http://openoffice.org/2004/writer',
        'xmlns:oooc' => 'http://openoffice.org/2004/calc',
        'xmlns:dom' => 'http://www.w3.org/2001/xml-events',
        'xmlns:rpt' => 'http://openoffice.org/2005/report',
        'xmlns:of' => 'urn:oasis:names:tc:opendocument:xmlns:of:1.2',
        'xmlns:xhtml' => 'http://www.w3.org/1999/xhtml',
        'xmlns:grddl' => 'http://www.w3.org/2003/g/data-view#',
        'xmlns:tableooo' => 'http://openoffice.org/2009/table',
        'xmlns:css3t' => 'http://www.w3.org/TR/css3-text/',
        'xmlns:xforms' => 'http://www.w3.org/2002/xforms',
        'xmlns:xsd' => 'http://www.w3.org/2001/XMLSchema',
        'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
        'xmlns:field' => 'urn:openoffice:names:experimental:ooo-ms-interop:xmlns:field:1.0',
        'xmlns:formx' => 'urn:openoffice:names:experimental:ooxml-odf-interop:xmlns:form:1.0'];

    $rootElement = $this->createNewElement('office:document-content', $attribute);
    $bodyElement = $this->createNewElement('office:body', $attribute);
    $textElement = $this->createNewElement('office:text');

    $this->getDocument()->appendChild($rootElement);
    $rootElement->appendChild($bodyElement);
    $bodyElement->appendChild($textElement);

    return $textElement;
  }

}
