Coding Standards
===============
The purpose of this document is to provide the coding standards that must be adhered to. The coding standards for HTML, CSS and JavaScript are provided. Any code that violates the coding standards will not be accepted.

##HTML##
The coding standards for HTML are based on the [Google HTML Style Guide](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml).

####Indentation####
Indent by two spaces at a time. Don't use tabs or mix tabs and spaces for indentation. Use a new line for every block, list, or table element, and indent every such child element. 

	<!-- Not recommended -->
	 	<ul>
  	  		<li>Fantastic
     <li>Great
	</ul>

	<!-- Recommended -->
	<ul>
  	  <li>Fantastic
  	  <li>Great
	</ul>	

####Capatilization####
All code has to be lowercase. This applies to HTML element names, attributes, attribute values, properties, and property values (with the exception of strings). 

	<!-- Not recommended -->
	<A HREF="/">Home</A>
	
	<!-- Recommended -->
	<img src="google.png" alt="Google">

####Comments####
Explain code as needed and where possible. Use comments to explain code: 

- What does it cover?
- What purpose does it serve?

####Document Type####
Use HTML5. HTML5 (HTML syntax) is preferred for all HTML documents: <!DOCTYPE html>. It’s recommended to use HTML, as text/html. Do not use XHTML. XHTML, as application/xhtml+xml, lacks both browser and infrastructure support and offers less room for optimization than HTML.

####Speration of Concerns####
 Strictly keep structure (HTML), presentation (CSS), and behavior (JavaScript) apart, and try to keep the interaction between the three to an absolute minimum.

That is, make sure documents and templates contain only HTML and HTML that is solely serving structural purposes. Move everything presentational into style sheets, and everything behavioral into scripts.

In addition, keep the contact area as small as possible by linking as few style sheets and scripts as possible from documents and templates.

	<!-- Not recommended -->
	<!DOCTYPE html>
	  <title>HTML sucks</title>
	  <link rel="stylesheet" href="base.css" media="screen">
	  <link rel="stylesheet" href="grid.css" media="screen">
	  <link rel="stylesheet" href="print.css" media="print">
	  <h1 style="font-size: 1em;">HTML sucks</h1>
	  <p>I’ve read about this on a few sites but now I’m sure:
	    <u>HTML is stupid!!1</u>
	  <center>I can’t believe there’s no way to control the styling of
	    my website without doing everything all over again!</center>
	
	<!-- Recommended -->
	<!DOCTYPE html>
	  <title>My first CSS-only redesign</title>
	  <link rel="stylesheet" href="default.css">
	  <h1>My first CSS-only redesign</h1>
	  <p>I’ve read about this on a few sites but today I’m actually
	    doing it: separating concerns and avoiding anything in the HTML of
	    my website that is presentational.
	  <p>It’s awesome!

####Quotation Marks####
Use double (" ") rather than single quotation marks (' ') around attribute values.

	<!-- Not recommended -->
	<a class='maia-button maia-button-secondary'>Sign in</a>
	
	<!-- Recommended -->
	<a class="maia-button maia-button-secondary">Sign in</a>


##CSS##
The coding standards for CSS are based on the [Google HTML Style Guide](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml).


##JavaScript##

##References##
- [http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xm](http://google-styleguide.googlecode.com/svn/trunk/htmlcssguide.xml)
