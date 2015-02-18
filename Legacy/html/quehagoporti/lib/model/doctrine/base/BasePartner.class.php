<?php

/**
 * BasePartner
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $email
 * @property integer $mobile
 * @property integer $association_id
 * @property Association $Association
 * 
 * @method string      getName()           Returns the current record's "name" value
 * @method string      getEmail()          Returns the current record's "email" value
 * @method integer     getMobile()         Returns the current record's "mobile" value
 * @method integer     getAssociationId()  Returns the current record's "association_id" value
 * @method Association getAssociation()    Returns the current record's "Association" value
 * @method Partner     setName()           Sets the current record's "name" value
 * @method Partner     setEmail()          Sets the current record's "email" value
 * @method Partner     setMobile()         Sets the current record's "mobile" value
 * @method Partner     setAssociationId()  Sets the current record's "association_id" value
 * @method Partner     setAssociation()    Sets the current record's "Association" value
 * 
 * @package    quehagoporti
 * @subpackage model
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePartner extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('partner');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('mobile', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('association_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Association', array(
             'local' => 'association_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}