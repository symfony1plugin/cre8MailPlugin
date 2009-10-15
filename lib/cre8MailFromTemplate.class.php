<?php
/**
 * Extends Swift_Message class by providing methods to deal with cre8MailFromTemplate 
 *
 */
class cre8MailFromTemplate extends cre8Mail
{
  protected $template;
  protected $templateParameters;
	
  /**
   * Constructor
   * @param string template
   * @param string templateParameters (array)
   * @param string type
   * @param string encoding
   * @param string charset
   */
  public function __construct($template, $templateParameters=array(), $type="text/plain", $encoding=null, $charset=null)
  {
    parent::__construct(null, null, $type, $charset);
    $this->setTemplate($template, $templateParameters);
  }
 
  /**
   * Set template
   * @param string Template (from app.yml)
   * @param array<string> TemplateParameters for replacing
   * @param string Charset
   */
  public function setTemplate($template, $templateParameters = null, $charset = null)
  {
    // Check if template exists in database
    $cre8EmailTemplate = Cre8EmailTemplate::retrieveByPK($template);
    if (!$cre8EmailTemplate)
      throw new Exception('email template is empty');
  	
    $this->templateParameters = $templateParameters;
  	$this->template = $template;

  	parent::setSubject($cre8EmailTemplate->getSubject());
  	if($this->getContentType() == "text/html") {
  	  parent::setBody($cre8EmailTemplate->getBody(), 'text/html', $charset);
  	}
  	if($cre8EmailTemplate->getTextBody()) {
  	  parent::addPart($cre8EmailTemplate->getTextBody(), 'text/plain', $charset);
  	}
  	
  	
  	
  }
  
  /**
   * Get current template name
   * 
   * @return string Template
   */
  public function getTemplate()
  {
  	return $this->template;
  }
  
  
  static public function convertToAbsolutePath($txt)
  {
    return preg_replace_callback('%(src|href)=["|\'](/.*)("|\')%i', array('cre8MailFromTemplate', 'compute_replacement'), $txt);
  }
  
  static public function compute_replacement($groups) 
  {
    return $groups[1] . '=' . $groups[3] . 'http://' . sfContext::getInstance()->getRequest()->getHost() . $groups[2] . $groups[3];
  }
  
}
