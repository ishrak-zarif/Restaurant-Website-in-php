<?php
 class MyXml
 {	

	function read_xml( $xml_file = "" )
	{
		$xlm_arr = array();
		$j = 0;
		if ( !$dom = domxml_open_file( $xml_file ) )
		{
		  echo "Error while parsing the document\n";
		  exit;
		}
		
		$st = " > ";
		$co =1;
		$element = $dom->document_element();
		$child = $element->first_child();
		while ($child)
		{
		   if ( $child->has_child_nodes() )
		   {
				$co = $co +1;
				$child = $child->first_child();
				if ( !$child->is_blank_node() ) 
				{
					$xml_arr[$j][0] = $child->get_content();
					$xml_arr[$j][1] = $co;
					$j = $j + 1;										
				}
			}
		   else
		   {
				if ( !$pp = $child->next_sibling() )
				{
				 	$child = $child->parent_node();
					$child = $child->next_sibling();
					$co = $co - 1;					
				}
				else $child = $pp;
			}
		} 
		return $xml_arr;  
	}
	
	
	function create_xml()
	{
		$title = "Cancer";
		$content = "Sever disease.";
	
		$p = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], "/"));
		echo $p . "/" . $title.".xml";

		if ( phpversion() >= "5" )
		{
		   $doc = new DOMDocument('1.0','iso-8859-1');
		   $doc->formatOutput = true;
			
		   $root = $doc->createElement('ARTICLE');
		   $doc->appendChild($root);
			
		   $xml_title = $doc->createElement('TITLE');
		   $root->appendChild($xml_title);
			
		   $text1 = $doc->createTextNode($title);
		   $xml_title->appendChild($text1);
			
		   $xml_content = $doc->createElement("CONTENT");
		   $root->appendChild($xml_content);

		   $text2 = $doc->createTextNode($content);
		   $xml_content->appendChild($text2);
			
		   $filename = $_SERVER['DOCUMENT_ROOT']."/test.xml";
		   $doc->save($filename);
		}
		else
		{
			$doc = domxml_new_doc("1.0");

			$root = $doc->create_element("ARTICLE");
			$doc->append_child($root);

			$xml_title = $doc->create_element("TITLE");
			$root->append_child($xml_title);

			
			$text1 = $doc->create_text_node($title);
			$xml_title->append_child($text1);

			$xml_content = $doc->create_element("CONTENT");
			$root->append_child($xml_content);

			$text2 = $doc->create_text_node($content);
			$xml_content->append_child($text2);
			
			$doc->dump_file($_SERVER['DOCUMENT_ROOT']."/test.xml", false, true);
		} 
	}
		   
 }		
 
		
 /* $arr = MyXml::read_xml("test1.xml");		
 foreach($arr as $k=>$v)
 {
	for($i = 0; $i< $v[1]; $i++) echo " > ";
 	echo $v[0]."<br>";
 } */
?>