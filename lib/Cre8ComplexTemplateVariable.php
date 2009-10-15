<?php

class Cre8ComplexTemplateVariable extends BaseCre8ComplexTemplateVariable 
{
  
  public function __construct()
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));
  }
  
  static public function getHomepage()
  {
    return url_for('@homepage', true);
  }
  
}