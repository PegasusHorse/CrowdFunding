<?php
/**
* @package      CrowdFunding
* @subpackage   Libraries
* @author       Todor Iliev
* @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
* @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
* CrowdFunding is free software. This vpversion may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

defined('JPATH_PLATFORM') or die;

JLoader::register("CrowdFundingTableReward", JPATH_ADMINISTRATOR .DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_crowdfunding".DIRECTORY_SEPARATOR."tables".DIRECTORY_SEPARATOR."reward.php");

/**
 * This class provieds functionality that manage rewards.
 */
class CrowdFundingReward extends CrowdFundingTableReward {
    
    public function __construct($id = 0) {
        
        $db = JFactory::getDbo();
        parent::__construct( $db );
        
        if(!empty($id)) {
            $this->load($id);
        }
    }

    /**
     * Increase the value of distributed rewards.
     * @param integer $number
     */
    public function increaseDistributed($number = 1) {
        
        $distributed  = $this->distributed + $number;
        
        if($distributed <= $this->number) {
            $this->distributed = $distributed;
            $this->available   = $this->number - $this->distributed;
        }
        
    }
}
