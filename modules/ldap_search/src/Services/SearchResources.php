<?php

/**
* @file providing the service that returns the LDAP records in Plain array format.
*
*/

namespace  Drupal\ldap_search\Services;

use Drupal\ldap_authentication\Helper\LdapAuthenticationConfiguration;
use Drupal\ldap_servers\Entity\Server;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;

class SearchResources {
	use StringTranslationTrait;
	/**
	 * The main server to work with.
	 *
	 * @var \Drupal\ldap_servers\Entity\Server
	 */
	protected $ldap_server;

	/**
	 * The search base. If NULL, we use default one. should not be esacaped.
	 *
	 * @var 
	 */
	protected $base_dn;

	/**
	 * The extra search filter. such as sAMAccountName=jbarclay.  
	 * Attribute values (e.g. jbarclay) should be esacaped before calling
	 * If NULL, we use default one.
	 *
	 * @var 
	 */
	protected $extra_filter;

	/**
	 * The type of members to include in search.
	 *   'active' 	: searches only active users
	 *   'inactive' : searches only inactive users
	 *   'both'		: 
	 *    NULL 		: Skips the Parameter altogether so searches all(active and inactive) users
	 *
	 * @var 
	 */
	protected $type;

	/**
	 * No. of records to return.
	 * @Any_Numeric_Value : Returns given no. of Records.
	 * 0 (Zero) for no limit i.e. All Records !
	 *
	 * @var 
	 */
	protected $result_count;

	/**
	 * An array of desired attributes. If omitted, we only return "mail".
	 *
	 * @var 
	 */
	protected $attributes;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->base_dn = "";
		$this->extra_filter = "";
		$this->type = NULL;
		// By default only 1 record will be returned.
		$this->result_count = 1;
		// By default only 'mail' atribute be returned.
		$this->attributes = ["mail"];
	}

 	/**
   	 * Sets an LDAP base_dn for search.
	 *
	 * @param string $base_dn
	 *   The search base. Should not be esacaped.
	 */
	public function set_base_dn($base_dn = NULL) {
  	  if (isset($base_dn) || !empty($base_dn) || $base_dn != NULL) {
	    $this->base_dn = $base_dn;
	  }
	}

 	/**
   	 * Gets an LDAP base_dn for search.
	 *
	 * @return string $base_dn
	 *   The search base. Should not be esacaped.
	 */
	public function get_base_dn() {
  	  return $this->base_dn;
	}

	/**
	 * Sets an LDAP extra_filter for search.
	 *
	 * @param string $extra_filter
	 *   The search filter.
	 */
	public function set_extra_filter($extra_filter = NULL) {
		if (isset($extra_filter) || !empty($extra_filter) || $extra_filter != NULL) {
	    	$this->extra_filter = $extra_filter;
	  	}
	}

	/**
	 * Sets an LDAP type for search.
	 *
	 * @param string $type
	 *   The type of members to include in search.
	 */
	public function set_type($type = NULL) {
		if (isset($type) || !empty($type) || $type != NULL) {
			$this->type = $type;
		}
	}

	/**
	 * Sets an LDAP result_count for search to return.
	 *
	 * @param int $result_count
	 *   No. of records to return. By default 1 (single) record will be returned.
	 *   However, 0 (Zero) is for no limit i.e. ALL Records.
	 */
	public function set_result_count($result_count = 1) {
		if (isset($result_count) && is_int($result_count)) {
			$this->result_count = $result_count;
		} else {
			// In Default case, i.e. by mistake if some one passes String, should fall back on int value.
			$this->result_count = 0;
		}
	}

	/**
	 * Sets an LDAP attributes for search to return.
	 *
	 * @param string $attributes
	 *  A Comma Separated string of desired attributes.
	 */
	public function set_attributes($attributes) {
		if (isset($attributes) || !empty($attributes)) {
			$attributes = explode(",", $attributes);
			$this->attributes = array_map('trim',$attributes);
		}
	}

	/**
	 * Function to return the LDAP Searched Resources.
	 *
	 * @param string $format
	 *  Format in which the result is expected, by default JSON formatted result is returned and
	 *  Plain array in else case.
	 * @return array $ldap_matches
	 *   Matching records found in LDAP or Error string in else case.
	 */
  	public function search_resource() {
  		$ldap_matches = [];
  		// Loop through servers.
  		foreach (LdapAuthenticationConfiguration::getEnabledAuthenticationServers() as $server) {
  			// Load LDAP Server.
  			$this->ldap_server = Server::load($server);
  			$bindStatus = $this->testConnectionAndBind();
  			// Confirm LDAP Server Connectivity.
  			if (is_object($this->ldap_server) && $bindStatus == Server::LDAP_SUCCESS) {
  				// Prepare $filter variable for Final Passing to Search.
	  			$filter = "(&(objectCategory=person)(objectClass=user)(sAMAccountType=805306368)";
	  			// Prepare Account Type check.
	      		$account_type_inactive = "(userAccountControl:1.2.840.113556.1.4.803:=2)";
				switch ($this->type) {
					case 'active':
						$filter.= "(!$account_type_inactive)";
						break;
					case 'inactive':
						$filter.= $account_type_inactive;
						break;
					case 'both':
					default:
						break;
				}
				$filter.= empty($this->extra_filter)?')':$this->extra_filter.")";

	  			// Query LDAP if All 3 mandatory parameters available.
	  			if (!empty($this->base_dn) && !empty($filter) && !empty($this->attributes) && is_array($this->attributes)) {
	  				$ldap_users = $this->ldap_server->search($this->base_dn, $filter, $this->attributes, 0, $this->result_count);
	  				// Loop thru found LDAP Users.
	  				foreach ($ldap_users as $ldap_user_key => $ldap_user) {
	  					// Loop thru asked attributes to prepare final array.
	  					foreach ($this->attributes as $key => $attribute) {
							$ldap_matches[$ldap_user_key][$attribute] = $ldap_user[$attribute][0];
						// End of Looping thru asked attributes array.
	  					}
	  				// End of Looping thru LDAP Users.
	  				}
	  				unset($ldap_matches['count']);
					if (empty($ldap_matches)) {
						$ldap_matches['error'] = $this->t('Record not found !!');
					}
	  			// End of Query LDAP.
	  			} else {
	  				$ldap_matches['error'] = $this->t('Failed to meet Search Criteria !!');
	  			}
  			} else {
  				$ldap_matches['error'] = $this->t('LDAP Server Connection Failed !!');
  			}
	  	// End of loop through servers.
	  	}
	  	if (empty($ldap_matches)) {
	  		$ldap_matches['error'] = $this->t('Unable to locate current LDAP Server !!');
	  	}
		return $ldap_matches;
  	}

  	/**
   	 * Test the connection.
     *
     */
  	private function testConnectionAndBind() {
	    if ($this->ldap_server->connect() != Server::LDAP_SUCCESS) {
	      	return LDAP_CONNECT_ERROR;
	    } else {
		    $bindResult = $this->ldap_server->bind();
		    if ($bindResult == Server::LDAP_SUCCESS)
		    	return Server::LDAP_SUCCESS;
		    else
		    	return Server::LDAP_LOCAL_ERROR;
	    }
  	}
}