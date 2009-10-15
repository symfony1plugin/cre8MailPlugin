<?php

class Cre8MailTemplate extends BaseCre8MailTemplate
{
  public function __toString()
  {
    return $this->getName();
  }
  
}


$columns_map = array('from'   => Cre8MailTemplatePeer::NAME,
                     'to'     => Cre8MailTemplatePeer::SLUG);

sfPropelBehavior::add('Cre8MailTemplate', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map, 'separator' => '_', 'permanent' => true)));
