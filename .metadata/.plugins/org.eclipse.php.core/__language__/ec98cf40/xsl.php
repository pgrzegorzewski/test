<?php

// Start of xsl v.7.2.0-dev

class XSLTProcessor  {

	/**
	 * Import stylesheet
	 * @link http://www.php.net/manual/en/xsltprocessor.importstylesheet.php
	 * @param object $stylesheet <p>
	 * The imported style sheet as a DOMDocument or
	 * SimpleXMLElement object.
	 * </p>
	 * @return bool true on success or false on failure
	 */
	public function importStylesheet ($stylesheet) {}

	/**
	 * Transform to a DOMDocument
	 * @link http://www.php.net/manual/en/xsltprocessor.transformtodoc.php
	 * @param DOMNode $doc <p>
	 * The node to be transformed.
	 * </p>
	 * @return DOMDocument The resulting DOMDocument or false on error.
	 */
	public function transformToDoc (DOMNode $doc) {}

	/**
	 * Transform to URI
	 * @link http://www.php.net/manual/en/xsltprocessor.transformtouri.php
	 * @param DOMDocument $doc <p>
	 * The document to transform.
	 * </p>
	 * @param string $uri <p>
	 * The target URI for the transformation.
	 * </p>
	 * @return int the number of bytes written or false if an error occurred.
	 */
	public function transformToUri (DOMDocument $doc, $uri) {}

	/**
	 * Transform to XML
	 * @link http://www.php.net/manual/en/xsltprocessor.transformtoxml.php
	 * @param object $doc <p>
	 * The DOMDocument or SimpleXMLElement object to
	 * be transformed.
	 * </p>
	 * @return string The result of the transformation as a string or false on error.
	 */
	public function transformToXml ($doc) {}

	/**
	 * Set value for a parameter
	 * @link http://www.php.net/manual/en/xsltprocessor.setparameter.php
	 * @param string $namespace <p>
	 * The namespace URI of the XSLT parameter.
	 * </p>
	 * @param string $name <p>
	 * The local name of the XSLT parameter.
	 * </p>
	 * @param string $value <p>
	 * The new value of the XSLT parameter.
	 * </p>
	 * @return bool true on success or false on failure
	 */
	public function setParameter ($namespace, $name, $value) {}

	/**
	 * Get value of a parameter
	 * @link http://www.php.net/manual/en/xsltprocessor.getparameter.php
	 * @param string $namespaceURI <p>
	 * The namespace URI of the XSLT parameter.
	 * </p>
	 * @param string $localName <p>
	 * The local name of the XSLT parameter.
	 * </p>
	 * @return string The value of the parameter (as a string), or false if it's not set.
	 */
	public function getParameter ($namespaceURI, $localName) {}

	/**
	 * Remove parameter
	 * @link http://www.php.net/manual/en/xsltprocessor.removeparameter.php
	 * @param string $namespaceURI <p>
	 * The namespace URI of the XSLT parameter.
	 * </p>
	 * @param string $localName <p>
	 * The local name of the XSLT parameter.
	 * </p>
	 * @return bool true on success or false on failure
	 */
	public function removeParameter ($namespaceURI, $localName) {}

	/**
	 * Determine if PHP has EXSLT support
	 * @link http://www.php.net/manual/en/xsltprocessor.hasexsltsupport.php
	 * @return bool true on success or false on failure
	 */
	public function hasExsltSupport () {}

	/**
	 * Enables the ability to use PHP functions as XSLT functions
	 * @link http://www.php.net/manual/en/xsltprocessor.registerphpfunctions.php
	 * @param mixed $restrict [optional] <p>
	 * Use this parameter to only allow certain functions to be called from 
	 * XSLT.
	 * </p>
	 * <p>
	 * This parameter can be either a string (a function name) or an array of
	 * functions.
	 * </p>
	 * @return void 
	 */
	public function registerPHPFunctions ($restrict = null) {}

	/**
	 * Sets profiling output file
	 * @link http://www.php.net/manual/en/xsltprocessor.setprofiling.php
	 * @param string $filename <p>
	 * Path to the file to dump profiling information.
	 * </p>
	 * @return bool true on success or false on failure
	 */
	public function setProfiling ($filename) {}

	/**
	 * Set security preferences
	 * @link http://www.php.net/manual/en/xsltprocessor.setsecurityprefs.php
	 * @param int $securityPrefs <p>
	 * The new security preferences. The following constants can be ORed:
	 * XSL_SECPREF_READ_FILE,
	 * XSL_SECPREF_WRITE_FILE,
	 * XSL_SECPREF_CREATE_DIRECTORY,
	 * XSL_SECPREF_READ_NETWORK,
	 * XSL_SECPREF_WRITE_NETWORK. Alternatively,
	 * XSL_SECPREF_NONE or
	 * XSL_SECPREF_DEFAULT can be passed.
	 * </p>
	 * @return int the old security preferences.
	 */
	public function setSecurityPrefs ($securityPrefs) {}

	/**
	 * Get security preferences
	 * @link http://www.php.net/manual/en/xsltprocessor.getsecurityprefs.php
	 * @return int A bitmask consisting of XSL_SECPREF_READ_FILE,
	 * XSL_SECPREF_WRITE_FILE,
	 * XSL_SECPREF_CREATE_DIRECTORY,
	 * XSL_SECPREF_READ_NETWORK,
	 * XSL_SECPREF_WRITE_NETWORK.
	 */
	public function getSecurityPrefs () {}

}
define ('XSL_CLONE_AUTO', 0);
define ('XSL_CLONE_NEVER', -1);
define ('XSL_CLONE_ALWAYS', 1);

/**
 * Deactivate all security restrictions.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_NONE', 0);

/**
 * Disallows reading files.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_READ_FILE', 2);

/**
 * Disallows writing files.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_WRITE_FILE', 4);

/**
 * Disallows creating directories.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_CREATE_DIRECTORY', 8);

/**
 * Disallows reading network files.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_READ_NETWORK', 16);

/**
 * Disallows writing network files.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_WRITE_NETWORK', 32);

/**
 * Disallows all write access, i.e. a bitmask of
 * XSL_SECPREF_WRITE_NETWORK |
 * XSL_SECPREF_CREATE_DIRECTORY |
 * XSL_SECPREF_WRITE_FILE.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('XSL_SECPREF_DEFAULT', 44);

/**
 * libxslt version like 10117. Available as of PHP 5.1.2.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('LIBXSLT_VERSION', 10128);

/**
 * libxslt version like 1.1.17. Available as of PHP 5.1.2.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('LIBXSLT_DOTTED_VERSION', "1.1.28");

/**
 * libexslt version like 813. Available as of PHP 5.1.2.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('LIBEXSLT_VERSION', 817);

/**
 * libexslt version like 1.1.17. Available as of PHP 5.1.2.
 * @link http://www.php.net/manual/en/xsl.constants.php
 */
define ('LIBEXSLT_DOTTED_VERSION', "1.1.28");

// End of xsl v.7.2.0-dev
