CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers

INTRODUCTION
------------

This LDAP Search module provides a seamless way to provide an API for developers to use.
The API will return the JSON formatted search result by default.  If needed, developer may seek
pure plain associative array in return instead of JSON by passing mere an extra parameter to search function.
API gives ample of facilities to developer(s) to sort out the results and get the one matching 
to the requirements.

 * For a full description of the module, visit the project page:
   https://www.drupal.org/project/ldap_search

 * To submit bug reports and feature suggestions, or track changes:
   https://www.drupal.org/project/issues/ldap_search

REQUIREMENTS
------------

This module requires the following module:

 * LDAP (https://www.drupal.org/project/ldap)
 * REST
 * Serialization

INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. Visit
   https://www.drupal.org/node/1897420 for further information.

CONFIGURATION
-------------

The module has no menu or modifiable settings. There is no configuration. When
enabled, the module will allow you to create a Service Object in a custom module
to conduct LDAP searches.

As an Example:

    A. Calling Service from .module OR .php File :

		1. Create a basic Service Object in your module whereever required.
			e.g.
				$service = \Drupal::service('ldap_search.search');

		2. Set the further filters or parameters as and how you like.
			e.g.
			    // It's Mandatory to set base_dn.
				$service->set_base_dn("OU=People,DC=community,DC=hogwarts,DC=com");

				// Optional to set any extra filter.
				$service->set_extra_filter("(memberOf=CN=Students,OU=Groups,DC=community,DC=hogwarts,DC=com)");

				// Optional to set the Record Types(Active/Inactive). If skipped, by default it will take as "both".
				$service->set_type("both");

				//  Optional, if skipped, by default 1 Record would be returned.
				$service->set_result_count(3);

				//  Optional, if skipped, by default, only 'mail' attribute will be returned.
				$service->set_attributes(["samaccountname","mail"]);

		3. Finally give a call to the service.
				// Returns Plain Array of Results.
				$result = $service->search_resource();

	B. Calling Service from JavaScript File.

		(function ($) {
			Drupal.behaviors.MyForm = {
			  attach: function(context) {
			    $('.my-text-box').change(function() {

		                var base_dn = "OU=People,DC=community,DC=hogwarts,DC=com";
		                var type = "active"; 
		                var attributes = "studentid, mail, displayname, title";
		                var extra_filter = "(memberOf=CN=Students,OU=Groups,DC=community,DC=hogwarts,DC=com)";
		                var result_count = 1;
		                $.ajax({
		                  url: "/v1/search_ldap_endpoint",
		                  type: 'get',
		                  data: 'base_dn=' + encodeURIComponent(base_dn) + '&extra_filter=' + encodeURIComponent(extra_filter) + '&type=' + encodeURIComponent(type) + '&attributes=' + encodeURIComponent(attributes) + '&result_count=' + encodeURIComponent(result_count),
		                  dataType: 'json',
		                  error: function(XMLHttpRequest, textStatus, errorThrown) {
		                    console.log("Failed to pull the student's data from LDAP !");
		                    console.log("XMLHttpRequest: " + JSON.stringify(XMLHttpRequest));
		                    console.log("textStatus: " + JSON.stringify(textStatus));
		                    console.log("errorThrown: " + JSON.stringify(errorThrown));
		                  },
		                  success: function (data) {
		                    // Since we're asking for result_count = 1, we're bound to get Single Result keyed 0 on Success.
		                    data_result = data[0];
		                    if (typeof data.error == "undefined" || data.error == '' || data.error == null) {
		                        $('.my-mail').val(data_result.mail);
		                        $('.my-studentid').val(data_result.studentid);
		                        $('.my-displayname').val(data_result.displayname);
		                        $('.my-title').val(data_result.title);
		                    } else {
		                        console.log("Record Not Found !!");
		                    }
		                  }
		                });

		            
			    });
			  }
			};
		})(jQuery);


MAINTAINERS
-----------

Current maintainers:
 * Sandip V. Tekale (sandip27) - https://www.drupal.org/user/2804167
