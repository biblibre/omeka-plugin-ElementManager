<?php

class ElementManager_IndexController extends Omeka_Controller_AbstractActionController
{
    /**
     * Configuration form.
     */
    public function indexAction()
    {
        $this->view->elements = $this->_getElements();
    }

    public function editAction()
    {
        $element_id = $this->_getParam('element_id');
        $this->view->element = $this->_getElement($element_id);
    }

    /**
     * Save configuration and redirect to configuration form.
     */
    public function saveAction()
    {
        $element_id = $this->_getParam('element_id');
        $name = $this->_getParam('name');
        $element = $this->_getElement($element_id);

        if ($name) {
            $element->name = $name;
            $element->save();

            $this->_helper->flashMessenger(__('Successfully saved configuration'),
                'success');
        }

        $this->_helper->redirector('index', 'index');
    }

    public function deleteAction()
    {
        $element_id = $this->_getParam('element_id');
        $confirm = $this->_getParam('confirm');

        $element = $this->_getElement($element_id);

        if ($confirm) {
            $element->delete();
            $this->_helper->flashMessenger(__('Successfully deleted element'),
                'success');
            $this->_helper->redirector('index', 'index');
        }

        $this->view->element = $element;
    }

    /**
     * Returns all elements grouped by element sets
     */
    protected function _getElements()
    {
        $db = get_db();
        $sql = "
            SELECT
                e.id AS element_id,
                e.name AS element_name,
                GROUP_CONCAT(it.name ORDER BY it.name ASC SEPARATOR ', ')
                  AS item_type_names
            FROM {$db->ItemTypesElements} ite
                JOIN {$db->Element} e ON e.id = ite.element_id
                JOIN {$db->ItemType} it ON it.id = ite.item_type_id
            GROUP BY e.id
            ORDER BY e.name
        ";
        $elements = $db->fetchAll($sql);

        return $elements;
    }

    protected function _getElement($element_id) {
        return get_db()
            ->getTable('Element')
            ->find($element_id);
    }
}
