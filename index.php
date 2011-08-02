<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MetaSpider</title>
    <meta name="description" content="Small SEO Tool. Gets Title, Meta Description and H1 from all pages in an XML Sitemap." />
    <link rel="stylesheet" href="css/seotools.css" type="text/css" media="screen" charset="utf-8" />
</head>
<body>
<div id="container">
	<h1><a href="index.php">MetaSpider</a></h1>

	<div class="pagebox">

		<p>Add the URL for a valid XML Sitemap. The spider will give you an overview of the <code>&lt;title&gt;</code>, Meta Description and <code>&lt;h1&gt;</code> tags from every page in the sitemap. This may take a while.</p>

		<form action="spider.php" method="post">
			<p><label for="sitemap_url">Sitemap URL</label><br />
			<input type="text" id="sitemap_url" name="sitemap_url" placeholder="http://www.domain.com/sitemap.xml" /></p>
		
			<p><input type="checkbox" name="show_links" id="show_links" /><label for="show_links">Show Link Info</label> (<em>Lists all links on the page in a table so you can analyse link text and the URL.</em>)</p>
		
			<input type="submit" value="Analyse Sitemap" />
		</form>
	</div>
</div>
</body>
</html>