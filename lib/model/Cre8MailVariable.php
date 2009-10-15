<?php

class Cre8MailVariable extends BaseCre8MailVariable
{
  public function __toString()
  {
    return $this->getName();
  }
}

$columns_map = array('from'   => Cre8MailVariablePeer::NAME,
                     'to'     => Cre8MailVariablePeer::SLUG);

sfPropelBehavior::add('Cre8MailVariable', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map, 'separator' => '_', 'permanent' => true)));

