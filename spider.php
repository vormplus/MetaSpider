<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>SEO Tools</title>
    <meta name="description" content="Small SEO Tool. Gets Title, Meta Description and H1 from all pages in an XML Sitemap." />
    <link rel="stylesheet" href="css/seotools.css" type="text/css" media="screen" charset="utf-8" />
</head>
<body>
<div id="container">
	<h1><a href="index.php">MetaSpider</a></h1>
<?php

$oldSetting = libxml_use_internal_errors( true );
libxml_clear_errors();

// $url = "http://vormplus.be/sitemap.php";
$url = $_POST["sitemap_url"];

$sitemapraw = (string)file_get_contents( $url );
$sitemapxml = new SimpleXMLElement( $sitemapraw );

foreach ( $sitemapxml as $url ) {
	echo '<div class="pagebox">' . "\n";
	echo "<p><strong>URL:</strong> " . $url->loc . "</p>\n";

	$html = new DOMDocument();
	$html->loadHTMLFile( $url->loc );
	
	$xpath = new DOMXpath( $html );
	
	// Add counter for length of Description (strlen)
	$title = $xpath->query('//title');
	foreach ($title as $t) {
		echo "<p><strong>Title: </strong> " . $t->nodeValue . "</p>" . "\n";
	}
	
	// Add counter for length of Description (strlen)
	$metadescription = $xpath->query('//meta[@name="description"]');
	foreach ($metadescription as $desc) {
		echo "<p><strong>Meta Description: </strong> " . $desc->getAttribute('content') . " </p>" . "\n";
	}

	$heading = $xpath->query('//h1');
	foreach ($heading as $h) {
		echo "<p><strong>H1: </strong> " . $h->nodeValue . "</p>" . "\n";
	}
	
	if ( $_POST['show_links'] ) {
		$links = $xpath->query('//a');

		echo '<table>';
		echo "<tr><th>Link Text</th><th>Link URL</th></tr>";
		foreach ( $links as $link ) {
			echo "<tr><td>" . $link->nodeValue . "</td><td>" . $link->getAttribute('href') . "</td></tr>\n";
		}
		echo "</table>";
	}	
	
	echo "</div>\n";
}

libxml_clear_errors();
libxml_use_internal_errors( $oldSetting );

?>
</div>
</body>
</html>