<?php

/**
 * Cre8MailVariable form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8MailVariableForm extends BaseCre8MailVariableForm
{
  public function configure()
  {
    unset(
      $this['slug'],
      $this['cre8_mail_template_variable_list']
    );
  }
}
