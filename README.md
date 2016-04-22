# MyFootpath PHP/MySQL Challenge – April 2016

We have the following two tables and would like to create a web-based report to know how many leads of each status (status_label) are assigned to a particular employee. Assignee is stored in the  lead_custom table where the lead_id matches id in the leads table, field_name is 0.0 Assignee and the  assignee as stored as the field_value. 

We would like the web report to display three columns: Assignee, Status, Count . If no get variables are given, it should display all assignees and statuses.
The webpage should also take two optional GET variables for assignee and status and should filter the  report if either or both variables are given. 
The MySQL table structure is as follows: 
CREATE TABLE `leads` ( 
 `id` varchar(255) NOT NULL, 
 `display_name` varchar(255) NOT NULL, 
 `status_label` varchar(255) NOT NULL, 
 `contact_name` varchar(255) NOT NULL, 
 `contact_email` varchar(255) NOT NULL, 
 `contact_phone` varchar(255) NOT NULL, 
 `created_by` varchar(255) NOT NULL, 
 `date_created` datetime NOT NULL, 
 `updated_by` varchar(255) NOT NULL, 
 `date_updated` datetime NOT NULL, 
 PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 

CREATE TABLE `lead_custom` ( 
 `lead_id` varchar(255) NOT NULL, 
 `field_name` varchar(255) NOT NULL, 
 `field_value` varchar(255) NOT NULL, 
 PRIMARY KEY (`lead_id`,`field_name`), 
 KEY `field_name` (`field_name`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 

Please use a public github repo to store your source code and submit your solution to this exercise via a  link to the public github repo as well as a link to a running version of the report. Please enter a few example records into your running version so that we can view a real live report. 
