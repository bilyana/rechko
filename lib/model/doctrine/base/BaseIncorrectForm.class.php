<?php

/**
 * BaseIncorrectForm
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $correct_word_id
 * @property integer $search_count
 * @property Word $CorrectWord
 * @property Doctrine_Collection $Revisions
 * 
 * @method string              getName()            Returns the current record's "name" value
 * @method integer             getCorrectWordId()   Returns the current record's "correct_word_id" value
 * @method integer             getSearchCount()     Returns the current record's "search_count" value
 * @method Word                getCorrectWord()     Returns the current record's "CorrectWord" value
 * @method Doctrine_Collection getRevisions()       Returns the current record's "Revisions" collection
 * @method IncorrectForm       setName()            Sets the current record's "name" value
 * @method IncorrectForm       setCorrectWordId()   Sets the current record's "correct_word_id" value
 * @method IncorrectForm       setSearchCount()     Sets the current record's "search_count" value
 * @method IncorrectForm       setCorrectWord()     Sets the current record's "CorrectWord" value
 * @method IncorrectForm       setRevisions()       Sets the current record's "Revisions" collection
 * 
 * @package    rechnik
 * @subpackage model
 * @author     borislav
 * @version    SVN: $Id: Builder.php 7200 2010-02-21 09:37:37Z beberlei $
 */
abstract class BaseIncorrectForm extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('incorrect_form');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));
        $this->hasColumn('correct_word_id', 'integer', 3, array(
             'type' => 'integer',
             'length' => '3',
             ));
        $this->hasColumn('search_count', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));


        $this->index('name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->index('name_correct', array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'correct_word_id',
             ),
             ));
        $this->index('search', array(
             'fields' => 
             array(
              0 => 'search_count',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Word as CorrectWord', array(
             'local' => 'correct_word_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('IncorrectFormRevision as Revisions', array(
             'local' => 'id',
             'foreign' => 'object_id'));

        $softdelete0 = new Doctrine_Template_SoftDelete();
        $this->actAs($softdelete0);
    }
}