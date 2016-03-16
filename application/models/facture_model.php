<?php
/**
 * Created by PhpStorm.
 * User: 1494778
 * Date: 2016-03-14
 * Time: 13:36
 */
class facture_model extends CI_Model
{
    private $count;
    protected $table = 'facture';

    function __construct()
    {
        parent::__construct();
        $this->count = 0;
    }

}