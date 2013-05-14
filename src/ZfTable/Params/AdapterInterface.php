<?php

namespace ZfTable\Params;

interface AdapterInterface
{

    /**
     * Get page
     * @return int
     */
    public function getPage();

    /**
     * Get order
     * @return string
     */
    public function getOrder();

    /**
     * Get Item count per page
     * @return ing
     */
    public function getItemCountPerPage();

    /**
     * Get column name to order
     * @return string | null
     */
    public function getColumn();

    /**
     * Get offset
     * @return int
     */
    public function getOffset();

    /**
     * Get quick search
     * @return string
     */
    public function getQuickSearch();
}
