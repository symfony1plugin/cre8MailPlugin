<?php


/**
 * This class adds structure of 'cre8_mail_template' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Wed Oct 14 16:14:06 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.cre8MailPlugin.lib.model.map
 */
class Cre8MailTemplateMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.cre8MailPlugin.lib.model.map.Cre8MailTemplateMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(Cre8MailTemplatePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(Cre8MailTemplatePeer::TABLE_NAME);
		$tMap->setPhpName('Cre8MailTemplate');
		$tMap->setClassname('Cre8MailTemplate');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', true, 60);

		$tMap->addColumn('SUBJECT', 'Subject', 'VARCHAR', true, 255);

		$tMap->addColumn('BODY', 'Body', 'LONGVARCHAR', true, null);

		$tMap->addColumn('TEXT_BODY', 'TextBody', 'LONGVARCHAR', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('SLUG', 'Slug', 'VARCHAR', true, 100);

		$tMap->addColumn('IS_RESTRICTED', 'IsRestricted', 'BOOLEAN', false, null);

	} // doBuild()

} // Cre8MailTemplateMapBuilder