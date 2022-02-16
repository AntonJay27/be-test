<?php 

class Parser{

  protected $sampleInput;
  public function __construct($sampleInput)
  {
    $this->sampleInput = $sampleInput;
  }

  private function decodeJson($input)
  {
    $result = json_decode($input, true);
    return (json_last_error() == JSON_ERROR_NONE)? $result : 'Incorrect JSON Format!';
  }

  public function parseJsonFile()
  {
    if(is_file($this->sampleInput))
    {
      $content = file_get_contents($this->sampleInput);
      $result = $this->decodeJson($content);
    }
    else
    {
      $result = "File not found!";
    }
    
    return $result;
  }

  public function parseJsonString()
  {
    return $this->decodeJson($this->sampleInput);
  }

  public function parseInteger()
  {
    $result  = array_map('intval', str_split($this->sampleInput));
    return $result;
  }

  public function parseString()
  {
    $result  = str_split($this->sampleInput);
    return $result;
  }

}

$sampleInput = 'sample.json';

$objParse = new Parser($sampleInput);

var_dump($objParse->parseJsonFile());
// var_dump($objParse->parseJsonString());
// var_dump($objParse->parseInteger());
// var_dump($objParse->parseString());


