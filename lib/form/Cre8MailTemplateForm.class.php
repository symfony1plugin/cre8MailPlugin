<?php

/**
 * Cre8MailTemplate form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8MailTemplateForm extends BaseCre8MailTemplateForm
{
  public function configure()
  {
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['slug']
    );
    
    $this->setWidget('body', new fckFormWidget(array(), array('height' => 500, 'width' => 600, 'tool' => 'Default', 'config' => '/cre8FormPlugin/js/fckeditor/cre8_config.js')));
    
    $this->widgetSchema['name']->setAttribute('style', 'width: 300px;');
    $this->widgetSchema['text_body']->setAttribute('rows', 10);
    $this->widgetSchema['text_body']->setAttribute('cols', 72);
    $this->widgetSchema['subject']->setAttribute('style', 'width: 590px;');
    
    
    $this->widgetSchema['cre8_mail_template_variable_list']->setLabel('Available Variables');
    
  }
}
