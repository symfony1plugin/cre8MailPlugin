<?php

class Cre8MailTemplatePeer extends BaseCre8MailTemplatePeer
{
  /**
   * Get by slug
   *
   * @param string $slug
   * @return Cre8MailTemplate
   */
  static public function getBySlug($slug)
  {
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    return self::doSelectOne($c);
  }
}
