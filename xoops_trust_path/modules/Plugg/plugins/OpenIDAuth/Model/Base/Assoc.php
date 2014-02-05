<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/OpenIDAuth/Model/Assoc.php
*/
abstract class Plugg_OpenIDAuth_Model_Base_Assoc extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Assoc', $model);
        $this->_vars = array('assoc_id' => 0, 'assoc_created' => 0, 'assoc_updated' => 0, 'assoc_server_url' => null, 'assoc_handle' => null, 'assoc_secret' => null, 'assoc_issued' => 0, 'assoc_lifetime' => 0, 'assoc_type' => null);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('assoc_id' => 0, 'assoc_created' => 0, 'assoc_updated' => 0));
    }

    public function __toString()
    {
        return 'Assoc #' . $this->_get('id', null, null);
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['assoc_id'];
        case 'created':
            return $this->_vars['assoc_created'];
        case 'updated':
            return $this->_vars['assoc_updated'];
        case 'server_url':
            return $this->_vars['assoc_server_url'];
        case 'handle':
            return $this->_vars['assoc_handle'];
        case 'secret':
            return $this->_vars['assoc_secret'];
        case 'issued':
            return $this->_vars['assoc_issued'];
        case 'lifetime':
            return $this->_vars['assoc_lifetime'];
        case 'type':
            return $this->_vars['assoc_type'];
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('assoc_id', $value, $markDirty);
            break;
        case 'server_url':
            $this->_setVar('assoc_server_url', $value, $markDirty);
            break;
        case 'handle':
            $this->_setVar('assoc_handle', $value, $markDirty);
            break;
        case 'secret':
            $this->_setVar('assoc_secret', $value, $markDirty);
            break;
        case 'issued':
            $this->_setVar('assoc_issued', $value, $markDirty);
            break;
        case 'lifetime':
            $this->_setVar('assoc_lifetime', $value, $markDirty);
            break;
        case 'type':
            $this->_setVar('assoc_type', $value, $markDirty);
            break;
        }
    }

    protected function _initVar($name, $value)
    {
        switch ($name) {
        case 'assoc_secret':
            // use function defined for specific DB. any better way?
            $this->_vars['assoc_secret'] = sabai_db_unescapeBlob($value);
            break;
        default:
            $this->_vars[$name] = $value;
            break;
        }
    }
}

abstract class Plugg_OpenIDAuth_Model_Base_AssocRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Assoc', $model);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_OpenIDAuth_Model_Base_AssocsByRowset($rs, $this->_model->create('Assoc'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_OpenIDAuth_Model_Base_Assocs($this->_model, $entities);
    }
}

class Plugg_OpenIDAuth_Model_Base_AssocsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_OpenIDAuth_Model_Assoc $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Assocs', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_OpenIDAuth_Model_Base_Assocs extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Assocs', $entities);
    }
}