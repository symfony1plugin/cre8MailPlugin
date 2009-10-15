<?php

/**
 * Cre8MailTemplateVariable form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MailTemplateVariableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cre8_mail_template_id' => new sfWidgetFormInputHidden(),
      'cre8_mail_variable_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'cre8_mail_template_id' => new sfValidatorPropelChoice(array('model' => 'Cre8MailTemplate', 'column' => 'id', 'required' => false)),
      'cre8_mail_variable_id' => new sfValidatorPropelChoice(array('model' => 'Cre8MailVariable', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_mail_template_variable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MailTemplateVariable';
  }


}
