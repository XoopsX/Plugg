<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/User/Model/MetaGateway.php
*/
abstract class Plugg_User_Model_Base_MetaGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'meta';
    }

    public function getFields()
    {
        return array('meta_id' => Sabai_Model::KEY_TYPE_INT, 'meta_created' => Sabai_Model::KEY_TYPE_INT, 'meta_updated' => Sabai_Model::KEY_TYPE_INT, 'meta_key' => Sabai_Model::KEY_TYPE_VARCHAR, 'meta_value' => Sabai_Model::KEY_TYPE_TEXT, 'meta_serialized' => Sabai_Model::KEY_TYPE_INT, 'meta_user_id' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %smeta WHERE meta_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %smeta WHERE meta_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$smeta WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['meta_created'] = time();
        $values['meta_updated'] = 0;
        return sprintf("INSERT INTO %smeta(meta_created, meta_updated, meta_key, meta_value, meta_serialized, meta_user_id) VALUES(%d, %d, %s, %s, %d, %d)", $this->_db->getResourcePrefix(), $values['meta_created'], $values['meta_updated'], $this->_db->escapeString($values['meta_key']), $this->_db->escapeString($values['meta_value']), $values['meta_serialized'], $values['meta_user_id']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['meta_updated'];
        $values['meta_updated'] = time();
        return sprintf("UPDATE %smeta SET meta_updated = %d, meta_key = %s, meta_value = %s, meta_serialized = %d, meta_user_id = %d WHERE meta_id = %d AND meta_updated = %d", $this->_db->getResourcePrefix(), $values['meta_updated'], $this->_db->escapeString($values['meta_key']), $this->_db->escapeString($values['meta_value']), $values['meta_serialized'], $values['meta_user_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$smeta WHERE meta_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['meta_updated'] = 'meta_updated=' . time();
        return sprintf('UPDATE %smeta SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$smeta WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$smeta WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}