<?php

class LocalizedString
{
  /** members **/
  public $matchArray;
  
  /** methods **/
  function __construct($fileName)
  {
	  $this->matchArray = array();
	  $file = 'FILENAME.strings';
        //$file = "C:/xampp/htdocs/scholar_debug/scripts/locale/$fileName.strings";
        //$file = "../locale/$fileName.strings";
      //echo "locale file: ".$file."<br/>";
	  @$f = file_get_contents($file, FILE_USE_INCLUDE_PATH);
	  if($f){
	  	$arr = explode(';',$f);
	  	foreach( $arr as $line){
		  	if( preg_match("#\"\s*(.*?)\"=\"\s*(.*?)\"#s", $line, $match)==true ){
		  		//$this->matchArray[$match[2]] = $match[1];
		  		$array['from'] = $match[1];
		  		$array['to'] = $match[2];
		  		array_push($this->matchArray, $array);
		  	}
	  	}
	  	//echo "<pre>";print_r($this->matchArray);echo "</pre>";
	  }
	  else{
		  echo "error opening file: $file\n";
	  }
  }
  function translate($inputStr,$lang)
  {
    //asort($this->matchArray);
    //echo "input: $inputStr<br/>";
    if( $lang == 'usa' ){
      foreach($this->matchArray as $token){
        //echo "token: ".$token['from']."=>".$token['to']."<br/>";
        if( $inputStr == $token['from'] ) return $token['to'];
      }
      return $inputStr;
  	}
  	else if( $lang == 'tw' || $lang == '' ){
  	  return $inputStr;
  	}
  	else{
  	  return $inputStr;
  	}
  }

}

?>