<?php

/**
 * Cre8MailVariable form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MailVariableForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                               => new sfWidgetFormInputHidden(),
      'name'                             => new sfWidgetFormInput(),
      'description'                      => new sfWidgetFormTextarea(),
      'is_complex'                       => new sfWidgetFormInputCheckbox(),
      'slug'                             => new sfWidgetFormInput(),
      'cre8_mail_template_variable_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Cre8MailTemplate')),
    ));

    $this->setValidators(array(
      'id'                               => new sfValidatorPropelChoice(array('model' => 'Cre8MailVariable', 'column' => 'id', 'required' => false)),
      'name'                             => new sfValidatorString(array('max_length' => 60)),
      'description'                      => new sfValidatorString(array('required' => false)),
      'is_complex'                       => new sfValidatorBoolean(array('required' => false)),
      'slug'                             => new sfValidatorString(array('max_length' => 100)),
      'cre8_mail_template_variable_list' => new sfValidatorPropelChoiceMany(array('model' => 'Cre8MailTemplate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_mail_variable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MailVariable';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['cre8_mail_template_variable_list']))
    {
      $values = array();
      foreach ($this->object->getCre8MailTemplateVariables() as $obj)
      {
        $values[] = $obj->getCre8MailTemplateId();
      }

      $this->setDefault('cre8_mail_template_variable_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCre8MailTemplateVariableList($con);
  }

  public function saveCre8MailTemplateVariableList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['cre8_mail_template_variable_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(Cre8MailTemplateVariablePeer::CRE8_MAIL_VARIABLE_ID, $this->object->getPrimaryKey());
    Cre8MailTemplateVariablePeer::doDelete($c, $con);

    $values = $this->getValue('cre8_mail_template_variable_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Cre8MailTemplateVariable();
        $obj->setCre8MailVariableId($this->object->getPrimaryKey());
        $obj->setCre8MailTemplateId($value);
        $obj->save();
      }
    }
  }

}
