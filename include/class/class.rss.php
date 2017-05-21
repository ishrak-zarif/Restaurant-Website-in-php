<?php
class RSSParser{

   var $insideitem = false;
   var $insideimage = false;
   var $insidervw = false;
   var $insiderating = false;
   var $insidetext = false;
   var $url = "";
   var $enclosure = '';
   var $ent = array();
   
   var $cTitle, $cLink, $cDesc, $cLanguage, $cCopyright, $cManageEditor, $cWebmaster, $cLastBuild, $cRating, $cDocs, $cCategory,  $cGenerator, $cPubDate;
   var $imTitle, $imUrl, $imLink, $imWidth, $imHeight;
   var $iTitle, $iLink, $iDesc, $iAuthor, $iComments, $iEnclosure, $iGuid, $iPudDate, $iSource, $iCloud;
   var $iCategory = array();
   var $rvLink;
   var $dcIdentifier, $dcType, $dcTitle, $dcCreator, $dcPublisher, $dcDate, $dcmin, $dcmax, $dcvalue, $dcContributor, $dcFormat,
       $dcSubject, $dcSource, $dcLanguage, $dcRelation, $dcCoverage, $dcRights, $dcDescription;
   var $contenEncoded, $wfwComment;
   var $tTitle, $tLink, $tDesc, $tName;
   var $result;
   var $i = 0;
   
   //function init() { new RSSParser(); }
   
   function parse($url, $rss_parser){
   	
	$GLOBALS['items'] = array();
   	$xml_parser = @xml_parser_create();
    //$rss_parser = new RSSParser();
    xml_set_object($xml_parser,&$rss_parser);
    xml_set_element_handler($xml_parser, "startElement", "endElement");
    xml_set_character_data_handler($xml_parser, "characterData");
    if ($fp = @fopen($url,"r")){
       while ($data = fread($fp, 4096)){
          @xml_parse($xml_parser, $data, @feof($fp)); //or die(sprintf("XML error: %s at line %d",  xml_error_string(xml_get_error_code($xml_parser)), xml_get_current_line_number($xml_parser)));
       }
      @fclose($fp);
      @xml_parser_free($xml_parser);
    }
  } // end function
   


   function get_channel(){   	       
        return($GLOBALS['channel']);
   }
   
   function get_items(){
   	   return($GLOBALS['items']); 
   }
   
   function get_image(){
   	   if(isset($GLOBALS['image'])){
   	   	return($GLOBALS['image']);
   	   }
   }
     
   function get_rvw(){
   	   if(isset($GLOBALS['rvw'])){
        return($GLOBALS['rvw']);
   	   }
   }

   function get_rating(){
   	   if(isset($GLOBALS['rating'])){
   	    return($GLOBALS['rating']);
   	   }
   }
   
   function get_textinput(){
   	   if(isset($GLOBALS['textinput'])){
   	    return($GLOBALS['textinput']);
   	   }
   }
   
   function startElement($parser, $tagName, $attrs) {
   	
       $this->tag = $tagName;
       
   	   if($tagName == "ITEM") {
           $this->insideitem = true;
       }elseif($tagName == "IMAGE") {
       	   $this->insideimage = true;
       }elseif($tagName == "RVW:ITEM"){
       	   $this->insidervw = true;
       }elseif ($tagName == "RVW:RATING"){
       	   $this->insiderating = true;
       }elseif($tagName == 'TEXTINPUT'){
       	   $this->insidetext = true;
       }
       
       if($tagName == "ENCLOSURE") {
          $this->enclosure = $attrs;          
       }elseif ($tagName == 'ENT:TOPIC'){
          $this->ent = $attrs;         
       }
       elseif($tagName == 'ENT:CLOUD'){
       	  $this->iCloud = $attrs;
       }       
   }

   function characterData($parser, $data) {
       if ($this->insideitem) {
           switch ($this->tag) {
               case "TITLE":
               $this->iTitle .= $data;
               $this->i++;
               break;
               case "DESCRIPTION":
               $this->iDesc .= $data;
               break;
               case "LINK":
               $this->iLink .= $data;
               break; 
               case "AUTHOR":
               $this->iAuthor .= $data;
               break;
               case "CATEGORY":
               $this->iCategory[] .= $data;
               break;
               case "COMMENTS":
               $this->iComments .= $data;
               break;
               case "PUBDATE":
               $this->iPudDate .= $data;
               break;
               case "SOURCE":
               $this->iSource .= $data;
               break;
               case "GUID":
               $this->iGuid .= $data;
               break;
               case "DC:CONTRIBUTOR":
               $this->dcContributor .= $data;
               break;
               case "DC:FORMAT":
               $this->dcFormat .= $data;
               break;
               case "DC:RELATION":
               $this->dcRelation .= $data;
               break;
               case "DC:COVERAGE":
               $this->dcCoverage .= $data;
               break;
               case "DC:IDENTIFIER":
               $this->dcIdentifier .= $data;
               break;
               case "DC:TYPE":
               $this->dcType .= $data;
               break; 
               case "DC:TITLE":
               $this->dcTitle .= $data;
               break;
               case "DC:CREATOR":
               $this->dcCreator .= $data;
               break;
               case "DC:PUBLISHER":
               $this->dcPublisher .= $data;
               break;
               case "DC:DATE":
               $this->dcDate .= $data;
               break;
               case "DC:SUBJECT":
               $this->dcSubject .= $data;
               break;
               case "DC:SOURCE":
               $this->dcSource .= $data;
               break;
               case "DC:LANGUAGE":
               $this->dcLanguage .= $data;
               break;
               case "DC:RIGHTS":
               $this->dcRights .= $data;
               break;
               case "DC:DESCRIPTION":
               $this->dcDescription .= $data;
               break;
               case "CONTENT:ENCODED":
               $this->contenEncoded .= $data;
               break;
               case "WFW:COMMENTRSS":
               $this->wfwComment .= $data;
               break;
           }
                  
       }
       if($this->insideimage){
       	   switch ($this->tag) {
               case "TITLE":
               $this->imTitle .= $data;
               break;
               case "URL":
               $this->imUrl .= $data;
               break;
               case "LINK":
               $this->imLink .= $data;
               break; 
               case "WIDTH":
               $this->imWidth .= $data;
               break;
               case "HEIGHT":
               $this->imHeight .= $data;
               break;
       	   }        	 
       }
       if($this->insidervw){
           switch ($this->tag) {
               case "RVW:LINK":
               $this->rvLink .= $data;
               break;               
       	   }  
       }
       if($this->insiderating){
           switch ($this->tag) {
               case "RVW:MINIMUM":
               $this->rvmin .= $data;
               break;
               case "RVW:MAXIMUM":
               $this->rvmax .= $data;
               break;
               case "RVW:VALUE":
               $this->rvvalue .= $data;
               break; 
           }
       }
       if($this->insidetext){
       	    switch ($this->tag) {
               case "TITLE":
               $this->tTitle .= $data;
               break;
               case "DESCRIPTION":
               $this->tDesc .= $data;
               break;
               case "LINK":
               $this->tLink .= $data;
               break; 
               case "NAME":
               $this->tName .= $data;
               break;               
       	   }         	
       }
       if(!$this->insideitem && ! $this->insidervw && !$this->insiderating && !$this->insidetext && !$this->insideimage){
       		switch ($this->tag) {
               case "TITLE":
               $this->cTitle .= $data;
               break;
               case "LINK":
               $this->cLink .= $data;
               break;
               case "DESCRIPTION":
               $this->cDesc .= $data;
               break; 
               case "LANGUAGE":
               $this->cLanguage .= $data;
               break;
               case "COPYRIGHT":
               $this->cCopyright .= $data;
               break;
               case "MANAGINGEDITOR":
               $this->cManageEditor .= $data;
               break;
               case "WEBMASTER":
               $this->cWebmaster .= $data;
               break;
               case "LASTBUILDDATE":
               $this->cLastBuild .= $data;
               case "GENERATOR":
               $this->cGenerator .= $data;
               break;
               case "RATING":
               $this->cRating .= $data;
               break;
               case "DOCS":
               $this->cDocs .= $data;
               break;   
               case "CATEGORY":
               $this->cCategory .= $data; 
               break;
               case "PUBDATE":
               $this->cPubDate .= $data;          
       	   }       	      	
       	 
       }
   }
   
   function endElement($parser, $tagName) {
   	   
       if ($tagName == "ITEM") {
           
           $this->result['item']["title"] = $this->iTitle;
           $this->result['item']["description"] = $this->iDesc;
           $this->result['item']["link"] = $this->iLink;
           $this->result['item']["author"] = $this->iAuthor;
           $this->result['item']['category'] = $this->iCategory;
           $this->result['item']['comments'] = $this->iComments;
           $this->result['item']['pubdate'] = $this->iPudDate;
           $this->result['item']["source"] = $this->iSource;             
           $this->result['item']['enclosure'] = $this->enclosure;
           $this->result['item']['guid'] = $this->iGuid;  
           $this->result['item']['ent'] = $this->ent;
           $this->result['item']['cloud'] = $this->iCloud;   
           $this->result['item']['dc:identifier'] = $this->dcIdentifier;
           $this->result['item']['dc:type'] = $this->dcType;
           $this->result['item']['dc:title'] = $this->dcTitle;
           $this->result['item']['dc:creator'] = $this->dcCreator;
           $this->result['item']['dc:publisher'] = $this->dcPublisher;
           $this->result['item']['dc:date'] = $this->dcDate;  
           $this->result['item']['dc:contributor'] = $this->dcContributor;
           $this->result['item']['dc:format'] = $this->dcFormat;
           $this->result['item']['dc:source'] = $this->dcSource;
           $this->result['item']['dc:language'] = $this->dcLanguage;
           $this->result['item']['dc:relation'] = $this->dcRelation;
           $this->result['item']['dc:coverage'] = $this->dcCoverage;
           $this->result['item']['dc:rights'] = $this->dcRights;
           $this->result['item']['dc:desc'] = $this->dcDescription;      
           $this->result['item']['dc:subject'] = $this->dcSubject;    
           $this->result['item']['content:encoded'] = $this->contenEncoded;
           $this->result['item']['wfw'] = $this->wfwComment;
                       
           $GLOBALS['items'][] = $this->result['item'];
           $this->iTitle = "";
           $this->iDesc = "";
           $this->iLink = "";
           $this->iAuthor = "";
           $this->iCategory = array();
           $this->iComments = '';
           $this->iPudDate = "";
           $this->iSource = ""; 
           $this->enclosure = "";
           $this->guid = "";
           $this->iGuid = '';
           $this->ent = array();
           $this->iCloud = array();
           $this->dcLink = "";
           $this->dcIdentifier = "";
           $this->dcType = "";
           $this->dcTitle = "";
           $this->dcCreator = "";
           $this->dcPublisher = "";
           $this->dcDate = "";   
           $this->dcContributor = "";
           $this->dcFormat = "";
           $this->dcSource = "";
           $this->dcLanguage = "";
           $this->dcRelation = "";
           $this->dcCoverage = "";
           $this->dcRights = "";
           $this->dcDescription = "";                
           $this->dcSubject = "";
           $this->contenEncoded = "";
           $this->wfwComment = "";
           $this->insideitem = false;          
       }
       if ($tagName == 'IMAGE'){

           $this->result['image']['title'] = $this->imTitle;
           $this->result['image']['url'] = $this->imUrl;
           $this->result['image']['link'] = $this->imLink;
           $this->result['image']['width'] = $this->imWidth;
           $this->result['image']['height'] = $this->imHeight;	 
           

           $GLOBALS['image'] = $this->result['image'];
           $this->imTitle = "";
           $this->imUrl = "";
           $this->imLink = "";
           $this->imWidth = "";
           $this->imHeight = "";           
           $this->insideimage = false;
           
       }
       if ($tagName == 'RVW:ITEM'){
       	
       	   $this->result['rvw']['link'] = $this->rvLink;                     
                    
           $GLOBALS['rvw'][$i] = $this->result['rvw'];               
           $this->insidervw = false;
       }
       if ($tagName == 'RVW:RATING'){
       	
       	   $this->result['rating']['min'] = $this->rvmin;
           $this->result['rating']['max'] = $this->rvmax;
           $this->result['rating']['value'] = $this->rvvalue;
                              
           $GLOBALS['rating'][$i] = $this->result['rating'];
           $this->rvmin = "";
           $this->rvmax = "";
           $this->rvvalue = "";
           $this->insiderating = false;
       }
       if($tagName == 'CHANNEL'){
       	    $this->result['channel']['title'] = $this->cTitle;
            $this->result['channel']['link'] = $this->cLink;
            $this->result['channel']['desc'] = $this->cDesc;
            $this->result['channel']['lang'] = $this->cLanguage;
            $this->result['channel']['copy'] = $this->cCopyright;
            $this->result['channel']['editor'] = $this->cManageEditor;
            $this->result['channel']['webmaster'] = $this->cWebmaster;
            $this->result['channel']['lastbuild'] = $this->cLastBuild;
            $this->result['channel']["generator"] = $this->cGenerator; 
            $this->result['channel']['rating'] = $this->cRating;
            $this->result['channel']['docs'] = $this->cDocs;
            $this->result['channel']['category'][] = $this->cCategory;
            $this->result['channel']['pubDate'] = $this->cPubDate;
       	                
            $GLOBALS['channel'] = $this->result['channel'];
            $this->cTitle = '';
            $this->cLink = '';
            $this->cDesc = '';
            $this->cLanguage = '';
            $this->cCopyright = '';
            $this->cManageEditor = '';
            $this->cWebmaster = '';
            $this->cLastBuild = '';
            $this->cGenerator = '';
            $this->cRating = '';
            $this->cDocs = '';  	
            $this->cPubDate = '';   
       }
       if ($tagName == 'TEXTINPUT'){

           $this->result['textinput']['title'] = $this->tTitle;
           $this->result['textinput']['name'] = $this->tName;
           $this->result['textinput']['link'] = $this->tLink;
           $this->result['textinput']['description'] = $this->tDesc;      

           $GLOBALS['textinput'] = $this->result['textinput'];
           $this->tTitle = "";
           $this->tDesc = "";
           $this->tLink = "";
           $this->tName = "";
           $this->insidetext = false;           
       }
   }

}//end class
?>