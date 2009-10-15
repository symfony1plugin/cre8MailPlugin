<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8MailTemplate filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MailTemplateFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                             => new sfWidgetFormFilterInput(),
      'subject'                          => new sfWidgetFormFilterInput(),
      'body'                             => new sfWidgetFormFilterInput(),
      'text_body'                        => new sfWidgetFormFilterInput(),
      'created_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'slug'                             => new sfWidgetFormFilterInput(),
      'is_restricted'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cre8_mail_template_variable_list' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MailVariable', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                             => new sfValidatorPass(array('required' => false)),
      'subject'                          => new sfValidatorPass(array('required' => false)),
      'body'                             => new sfValidatorPass(array('required' => false)),
      'text_body'                        => new sfValidatorPass(array('required' => false)),
      'created_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'slug'                             => new sfValidatorPass(array('required' => false)),
      'is_restricted'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cre8_mail_template_variable_list' => new sfValidatorPropelChoice(array('model' => 'Cre8MailVariable', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_mail_template_filters[%s]');

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

    $criteria->addJoin(Cre8MailTemplateVariablePeer::CRE8_MAIL_TEMPLATE_ID, Cre8MailTemplatePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Cre8MailTemplateVariablePeer::CRE8_MAIL_VARIABLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Cre8MailTemplateVariablePeer::CRE8_MAIL_VARIABLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Cre8MailTemplate';
  }

  public function getFields()
  {
    return array(
      'id'                               => 'Number',
      'name'                             => 'Text',
      'subject'                          => 'Text',
      'body'                             => 'Text',
      'text_body'                        => 'Text',
      'created_at'                       => 'Date',
      'updated_at'                       => 'Date',
      'slug'                             => 'Text',
      'is_restricted'                    => 'Boolean',
      'cre8_mail_template_variable_list' => 'ManyKey',
    );
  }
}
