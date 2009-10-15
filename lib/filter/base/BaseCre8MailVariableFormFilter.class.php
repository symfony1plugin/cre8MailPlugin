<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8MailVariable filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MailVariableFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                             => new sfWidgetFormFilterInput(),
      'description'                      => new sfWidgetFormFilterInput(),
      'is_complex'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'                             => new sfWidgetFormFilterInput(),
      'cre8_mail_template_variable_list' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MailTemplate', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                             => new sfValidatorPass(array('required' => false)),
      'description'                      => new sfValidatorPass(array('required' => false)),
      'is_complex'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'                             => new sfValidatorPass(array('required' => false)),
      'cre8_mail_template_variable_list' => new sfValidatorPropelChoice(array('model' => 'Cre8MailTemplate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_mail_variable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCre8MailTemplateVariableListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(Cre8MailTemplateVariablePeer::CRE8_MAIL_VARIABLE_ID, Cre8MailVariablePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Cre8MailTemplateVariablePeer::CRE8_MAIL_TEMPLATE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Cre8MailTemplateVariablePeer::CRE8_MAIL_TEMPLATE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Cre8MailVariable';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'name'                             => 'Text',
      'description'                      => 'Text',
      'is_complex'                       => 'Boolean',
      'slug'                             => 'Text',
      'cre8_mail_template_variable_list' => 'ManyKey',
    );
  }
}
